<?php
require_once('./core/model.php');

class OrderContentModel extends Model {

	const ID_MAIN_PARENT = 0;

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
	
	public static function getAllForParentModel()
	{
		$params = self::getParams('getAllForParentModel', ['id_order', 'status', 'id_parent']);
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























