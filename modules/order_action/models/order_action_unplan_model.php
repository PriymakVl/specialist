<?php
require_once('order_action_base.php');

class OrderActionUnplanModel extends OrderActionBase {
	
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
	
	public static function getActionsModel()
	{
		$sql = 'SELECT * FROM `order_action_unplan` WHERE `state` != :state AND `status` = :status ORDER BY	`state` DESC';
		$params = ['state' => OrderActionState::ENDED, 'status' => self::STATUS_ACTIVE];
		return self::perform($sql, $params)->fetchAll();
	}
	
	public static function setState($params)
	{
		$params = self::selectParams($params, ['state', 'id_action']);
		$sql = 'UPDATE `order_action_unplan` SET `state` = :state WHERE `id` = :id_action';
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
		$keys = ['state', 'prod_name', 'prod_symbol', 'action_name', 'qty', 'time_manufac', 'note', 'id_action'];
		$params = self::selectParams($params, $keys);
		$sql = 'UPDATE `order_action_unplan` SET `state` = :state, `prod_name` = :prod_name, `prod_symbol` = :prod_symbol, `action_name` = :action_name,
			`qty` = :qty, `time_manufac` = :time_manufac, `note` = :note WHERE `id` = :id_action';
		return self::perform($sql, $params);
	}
	
	public static function setTimeStart($params)
	{
		$params = self::selectParams($params, ['time', 'id_worker', 'id_action']);
		$sql = 'UPDATE `order_action_unplan` SET `time_start` = :time, `id_worker` = :id_worker WHERE `id` = :id_action';
		return self::perform($sql, $params);
	}
	
	public static function setTimeEnd($params)
	{
		$params = self::selectParams($params, ['time', 'id_worker', 'id_action']);
		$sql = 'UPDATE `order_action_unplan` SET `time_end` = :time, `id_worker` = :id_worker WHERE `id` = :id_action';
		return self::perform($sql, $params);
	}
	
}






















