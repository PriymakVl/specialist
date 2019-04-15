<?php

trait OrderActionModelAdd {

	private function addDataModel($action, $product)
	{
		$params = $this->addDataModelParams($action, $product);
        return $this->addActionModel($params);
	}
	
	private function addForProductModel()
	{
		$params = $this->addForProductModelParams();
        return $this->addActionModel($params);
	}
	
	private function addForOrderModel()
	{
		$params = $this->addForOrderModelParams();
		return $this->addActionModel($params);
	}
	
	private function addActionModel($params)
	{
		$sql = "INSERT INTO `order_actions` (id_order, id_prod, qty, name, price, number, state, type_order, time_prepar, time_prod, note, rating) 
		VALUES (:id_order, :id_prod, :qty, :name, :price, :number, :state, :type_order, :time_prepar, :time_prod, :note, :rating)";
        return self::insert($sql, $params);
	}

}