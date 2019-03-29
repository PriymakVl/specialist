<?php

trait OrderProductModel {

	use OrderProductParam;
	
	public function get($id_order)
	{
		$sql = 'SELECT * FROM `order_products` WHERE `id_order` = :id_order AND `status` = :status';
        $params = ['id_order' => $id_order, 'status' => STATUS_ACTIVE];
        $items = self::perform($sql, $params)->fetchAll();
        return self::createArrayContent($items);
	}

	public function addOne($params)
	{
        $sql = "INSERT INTO `order_products` (id_order, id_prod, qty, id_parent, state) VALUES (:id_order, :id_prod, :qty, :id_parent, :state)";
        return self::insert($sql, $params);
	}
	
	public function getMainParentOrderModel($id_order)
	{
		$sql = 'SELECT * FROM `order_products` WHERE `id_order` = :id_order AND `status` = :status AND `id_parent` = :id_parent';
        $params = ['id_order' => $id_order, 'status' => STATUS_ACTIVE, 'id_parent' => self::ID_MAIN_PARENT];
        return self::perform($sql, $params)->fetchAll();
	}
	
	public function getByIdParent()
	{
		$sql = 'SELECT * FROM `order_products` WHERE `id_parent` = :id_order AND `status` = :status AND `id_parent` = :id_parent';
        $params = ['id_order' => $this->id_order, 'status' => STATUS_ACTIVE, 'id_parent' => $this->id];
        return self::perform($sql, $params)->fetchAll();
	}
	
	public function editModel()
	{
		$params = self::selectParams(['qty', 'id_prod', 'state']);
		$sql = 'UPDATE `order_products` SET `qty` = :qty, `state` = :state WHERE `id` = :id_prod';
		return self::update($sql, $params);
	}
	
	// public static function deleteOne($id_order, $id_prod)
	// {
		// $sql = 'UPDATE `order_products` SET `status` = :status WHERE `id_prod` = :id_prod AND `id_order` = :id_order';
		// $params = ['id_order' => $id_order, 'id_prod' => $id_prod, 'status' => STATUS_DELETE];
		// return self::perform($sql, $params);
	// }
	
	public function getParentData()
	{
		$params = ['id_parent' => $this->id_parent];
		$sql = 'SELECT * FROM `order_products` WHERE `id` = :id_parent';
		return self::perform($sql, $params)->fetch();
	}
	
	
	
	
	
	
	
	
	
	

	
	

	
	
}























