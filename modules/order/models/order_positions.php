<?php
require_once('order_base.php');

class OrderPositions extends OrderBase {

	public static function add($params)
	{
        $sql = "INSERT INTO `order_positions` (id_order, symbol, qty, note) VALUES (:id_order, :symbol, :qty, :note)";
        return self::perform($sql, $params);
	}
	
	public static function get($id_order)
	{
		$params = ['id_order' => $id_order, 'status' => self::STATUS_ACTIVE];
		$sql = 'SELECT * FROM `order_positions` WHERE `id_order` = :id_order AND `status` = :status';
        return self::perform($sql, $params)->fetchAll();
	}
	
}























