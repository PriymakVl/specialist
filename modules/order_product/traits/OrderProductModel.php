<?php

trait OrderProductModel {

	use OrderProductParam;
	
	// public function get($id_order)
	// {
		// $sql = 'SELECT * FROM `order_products` WHERE `id_order` = :id_order AND `status` = :status';
        // $params = ['id_order' => $id_order, 'status' => STATUS_ACTIVE];
        // $items = self::perform($sql, $params)->fetchAll();
        // return self::createArrayContent($items);
	// }

	public function addDataModel($product, $id_parent)
	{
		$params = $this->addDataModelParams($product, $id_parent);
        $sql = "INSERT INTO `order_products` (id_order, name, symbol, type, number, note, qty, id_parent, state) 
			VALUES (:id_order, :name, :symbol, :type, :number, :note, :qty, :id_parent, :state)";
        return self::insert($sql, $params);
	}
	
	public function addFormModel($product, $id_parent)
	{
		$params = $this->addFormModelParams();
        $sql = "INSERT INTO `order_products` (id_order, name, symbol, type, number, note, qty, id_parent, state) 
			VALUES (:id_order, :name, :symbol, :type, :number, :note, :qty, :id_parent, :state)";
        return self::insert($sql, $params);
	}
	
	
	public function getMainParentOrderModel($id_order)
	{
		$sql = 'SELECT * FROM `order_products` WHERE `id_order` = :id_order AND `status` = :status AND `id_parent` = :id_parent';
        $params = ['id_order' => $id_order, 'status' => STATUS_ACTIVE, 'id_parent' => self::ID_MAIN_PARENT];
        return self::perform($sql, $params)->fetchAll();
	}
	
	public function getByIdParent($id_parent = false)
	{
		$sql = 'SELECT * FROM `order_products` WHERE `status` = :status AND `id_parent` = :id_parent';
        $params = ['status' => STATUS_ACTIVE, 'id_parent' => $id_parent ? $id_parent : $this->id];
        return self::perform($sql, $params)->fetchAll();
	}
	
	public function editModel()
	{
		$params = $this->editModelParams(); 
		$sql = 'UPDATE `order_products` SET `qty` = :qty, `state` = :state, `symbol` = :symbol, `name` = :name, `type` = :type, `id_parent` = :id_parent,
			`number` = :number, `note` = :note WHERE `id` = :id_prod';
		return self::update($sql, $params);
	}
	
	public function getAllOnOrder($id_order)
	{
		$params = ['id_order' => $id_order, 'status' => STATUS_ACTIVE];
		$sql = 'SELECT * FROM `order_products` WHERE `id_order` = :id_order AND `status` = :status';
		return self::perform($sql, $params)->fetchAll();
	}
	
	
	
	
	
	
	
	
	
	

	
	

	
	
}























