<?php

trait OrderProductModel {

	use OrderProductParam;
	
	public static function addProductModel($params)
	{
        $sql = "INSERT INTO `order_products` (id_order, id_prod, qty) VALUES (:id_order, :id_prod, :qty)";
        return self::perform($sql, $params);
	}
	
	public static function get($id_order)
	{
		$sql = 'SELECT * FROM `order_content` WHERE `id_order` = :id_order AND `status` = :status';
        $params = ['id_order' => $id_order, 'status' => self::STATUS_ACTIVE];
        $items = self::perform($sql, $params)->fetchAll();
        return self::createArrayContent($items);
	}

	public static function addOne($params)
	{
        $sql = "INSERT INTO `order_content` (id_order, id_prod, quantity) VALUES (:id_order, :id_prod, :quantity)";
        return self::perform($sql, $params);
	}
	
	public static function getAllForOrderModel($id_order)
	{
		$sql = 'SELECT * FROM `order_content` WHERE `id_order` = :id_order AND `status` = :status AND `id_parent` = :id_parent';
        $params = ['id_order' => $id_order, 'status' => self::STATUS_ACTIVE, 'id_parent' = self::ID_MAIN_PARENT];
        return self::perform($sql, $params)->fetchAll();
	}
	
	public static function getSpecificationModel($id_parent)
	{
		$params = self::selectParams(['id_order', 'status']);
		$params['id_parent'] = $id_parent;
		$sql = 'SELECT * FROM `order_content` WHERE `id_order` = :id_order AND `status` = :status AND `id_parent` = :id_parent';
        return self::perform($sql, $params)->fetchAll();
	}
	
	public static function changeQuantity($params)
	{
		$sql = 'UPDATE `order_content` SET `quantity` = :qty WHERE `id` = :id_item';
		return self::update($sql, $params);
	}
	
	public static function deleteOne($id_order, $id_prod)
	{
		$sql = 'UPDATE `order_content` SET `status` = :status WHERE `id_prod` = :id_prod AND `id_order` = :id_order';
		$params = ['id_order' => $id_order, 'id_prod' => $id_prod, 'status' => self::STATUS_DELETE];
		return self::perform($sql, $params);
	}
	
	
	
	
	
	
	
	
	
	

	
	

	
	
}























