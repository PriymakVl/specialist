<?php
require_once('order_base.php');

class OrderActionUnplan extends OrderBase {
	
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
	
}























