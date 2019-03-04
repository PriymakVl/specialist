<?php
require_once('order_base.php');

class OrderActionState extends OrderBase {

	public static function add()
	{
		$sql = "INSERT INTO `order_action_states` (id_action, time, state, id_worker) VALUES (:id_action, :time, :state, :id_worker)";
        return self::perform($sql, $params);
	}
	
	public static function getByIdAction()
	{
		$sql = 'SELECT * FROM `order_actions_states` WHERE `id_action` = :id_action `status` = :status';
		return self::perform($sql, $params)->fetchAll();
	}
	
	
}























