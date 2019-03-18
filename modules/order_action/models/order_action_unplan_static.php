<?php
require_once('order_action_base.php');

class OrderActionUnplanStatic extends OrderActionBase {
	
	public static function add($params)
	{
		unset($params['save']);
		$fields = 'id_order, qty, state, prod_symbol, prod_name, action_name, time_manufac, note';
		$values = ':id_order, :qty, :state, :prod_symbol, :prod_name, :action_name, :time_manufac, :note';
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
		$params = ['id_order' => $id_order, 'state' => OrderActionState::ENDED, 'status' => self::STATUS_ACTIVE];
		return self::perform($sql, $params)->fetchAll();
	}
	
	public static function getActions()
	{
		$sql = 'SELECT * FROM `order_action_unplan` WHERE `state` != :state AND `status` = :status ORDER BY	`state` DESC';
		$params = ['state' => OrderActionState::ENDED, 'status' => self::STATUS_ACTIVE];
		$actions = self::perform($sql, $params)->fetchAll();
		if($actions) return self::createArrayActionsUnplan($actions);
	}
	
	public static function createArrayActionsUnplan($actions_arr)
	{
		$actions = Helper::createArrayOfObject($actions_arr, 'OrderActionUnplan');
		foreach ($actions as $action) {
			$action->getOrder()->setBgTerminalBox();
		}
		return $actions;
	}
	
	public static function setStateStartWork($params)
	{
		unset($params['action']);
		$sql = 'UPDATE `order_action_unplan` SET `state` = :state, `time_start` = :time, `id_worker` = :id_worker WHERE `id` = :id';
		return self::perform($sql, $params);
	}
	
	public static function setStateEndWork($params)
	{
		unset($params['action'], $params['id_worker']);
		$sql = 'UPDATE `order_action_unplan` SET `state` = :state, `time_end` = :time WHERE `id` = :id';
		return self::perform($sql, $params);
	}
	
	public static function setStateStopWork($params)
	{
		unset($params['action'], $params['id_worker'], $params['time']);
		$sql = 'UPDATE `order_action_unplan` SET `state` = :state WHERE `id` = :id';
		return self::perform($sql, $params);
	}
	
	public static function setStateEndedForAllActionsOrder($id_order)
	{
		$sql = 'UPDATE `order_action_unplan` SET `state` = :state WHERE `id_order` = :id_order';
		$params = ['id_order' => $id_order, 'state' => OrderActionState::ENDED];
		return self::perform($sql, $params);
	}
	
	public static function updateById($params)
	{
		unset($params['save'], $params['id_order'], $params['action'], $params['id_worker'], $params['time']);
		$sql = 'UPDATE `order_action_unplan` SET `state` = :state, `prod_name` = :prod_name, `prod_symbol` = :prod_symbol, `action_name` = :action_name,
			`qty` = :qty, `time_manufac` = :time_manufac, `note` = :note WHERE `id` = :id';
		return self::perform($sql, $params);
	}
	
}























