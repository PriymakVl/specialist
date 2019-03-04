<?php
require_once('order_base.php');

class OrderActionUnplan extends OrderBase {
	
	public $order;
	
	public function __construct($id)
    {
        $this->tableName = 'order_action_unplan';
        parent::__construct($id);
    }
	
	public static function add($params)
	{
		unset($params['save']);
		$fields = 'id_order, id_prod, id_action, qty, state, prod_symbol, prod_name, action_name, time_manufac, note';
		$values = ':id_order, :id_prod, :id_action, :qty, :state, :prod_symbol, :prod_name, :action_name, :time_manufac, :note';
        $sql = 'INSERT INTO `order_action_unplan` ('.$fields.') VALUES ('.$values.')';
        return self::perform($sql, $params);
	}
	
	public static function getByIdOrder($id_order)
	{
		$slq = 'SELECT * FROM `order_action_unplan` WHERE `id_order` = :id_order AND `status` = :status';
		$params = ['id_order' => $id_order, 'status' => self::STATUS_ACTIVE];
		return self::perform($slq, $params)->fetchAll();
	}
	
	public static function getNotReadyActionOrder($id_order)
	{
		$sql = 'SELECT * FROM `order_action_unplan` WHERE `state` != :state AND `id_order` = :id_order AND `status` = :status';
		$params = ['id_order' => $id_order, 'state' => self::STATE_WORK_END, 'status' => self::STATUS_ACTIVE];
		return self::perform($sql, $params)->fetchAll();
	}
	
	public static function getActions()
	{
		$sql = 'SELECT * FROM `order_action_unplan` WHERE `state` != :state AND `status` = :status';
		$params = ['state' => self::STATE_WORK_END, 'status' => self::STATUS_ACTIVE];
		$actions = self::perform($sql, $params)->fetchAll();
		if(empty($actions)) return false;
		return self::createArrayActionsUnplan($actions);
	}
	
	public static function createArrayActionsUnplan($actions_arr)
	{
		
		$actions = Helper::createArrayOfObject($actions_arr, 'OrderActionUnplan');
		foreach ($actions as $action) {
			$action->getOrder()->setBgTerminalBox();
		}
		return $actions;
	}
	
	public static function startWork($params)
	{
		unset($params['id_order'], $params['id_prod'], $params['type_action']);
		$sql = 'UPDATE `order_action_unplan` SET `state` = :state, `time_start` = :time_start, `id_worker` = :id_worker WHERE `id` = :id_action';
		return self::perform($sql, $params);
	}
	
	public static function endWork($params)
	{
		unset($params['type_action'], $params['id_prod'], $params['id_order']);
		$sql = 'UPDATE `order_action_unplan` SET `state` = :state, `time_end` = :time_end WHERE `id` = :id_action';
		return self::perform($sql, $params);
	}
	
	public static function stopWork($params)
	{
		unset($params['type_action'], $params['id_prod'], $params['id_order']);
		$sql = 'UPDATE `order_action_unplan` SET `state` = :state WHERE `id` = :id_action';
		return self::perform($sql, $params);
	}
	
}























