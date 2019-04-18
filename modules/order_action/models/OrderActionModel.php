<?php

trait OrderActionModel {
	
	use OrderActionModelUpdate, OrderActionModelSelect, OrderActionParam;
	
		private function addActionModel($params)
	{
		$sql = "INSERT INTO `order_actions` (id_order, id_prod, qty, name, price, number, state, type_order, time_prepar, time_prod, note, rating) 
		VALUES (:id_order, :id_prod, :qty, :name, :price, :number, :state, :type_order, :time_prepar, :time_prod, :note, :rating)";
        return self::insert($sql, $params);
	}
	
	
	
	
	
}























