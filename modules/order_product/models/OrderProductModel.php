<?php

trait OrderProductModel {

	use OrderProductParam, OrderProductModelSelect;
	
	public function addDataModel($product, $id_parent)
	{
		$params = $this->addDataModelParams($product, $id_parent);
        $sql = "INSERT INTO `order_products` (id_order, name, symbol, type, number, note, qty, id_parent, state, type_order) 
			VALUES (:id_order, :name, :symbol, :type, :number, :note, :qty, :id_parent, :state, :type_order)";
        return self::insert($sql, $params);
	}
	
	public function addFormModel($product, $id_parent)
	{
		$params = $this->addFormModelParams();
        $sql = "INSERT INTO `order_products` (id_order, name, symbol, type, number, note, qty, id_parent, state, type_order) 
			VALUES (:id_order, :name, :symbol, :type, :number, :note, :qty, :id_parent, :state, :type_order)";
        return self::insert($sql, $params);
	}
	
	public function editModel()
	{
		$params = $this->editModelParams(); 
		$sql = 'UPDATE `order_products` SET `qty` = :qty, `state` = :state, `symbol` = :symbol, `name` = :name, `type` = :type, `id_parent` = :id_parent,
			`number` = :number, `note` = :note WHERE `id` = :id_prod';
		return self::update($sql, $params);
	}
	
	
}






















