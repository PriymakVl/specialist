<?php

trait OrderProductModel {

	use OrderProductParam, OrderProductModelSelect;
	
	public function addDataModel($params)
	{
        $sql = "INSERT INTO `order_products` (id_order, name, symbol, type, number, note, qty, id_parent, state, type_order, date_exec) 
			VALUES (:id_order, :name, :symbol, :type, :number, :note, :qty, :id_parent, :state, :type_order, :date_exec)";
        return self::insert($sql, $params);
	}
	
	public function editModel()
	{
		$params = $this->editModelParams(); 
		$sql = 'UPDATE `order_products` SET `qty` = :qty, `symbol` = :symbol, `name` = :name, `type` = :type, `id_parent` = :id_parent,
			`number` = :number, `note` = :note, `date_exec` = :date_exec WHERE `id` = :id_prod';
		return self::update($sql, $params);
	}

	public function updateQuantityModel($qty)
	{
		$params = ['id_prod' => $this->id, 'qty' => $qty];
		$sql = 'UPDATE `order_products` SET `qty` = :qty  WHERE `id` = :id_prod';
		return self::update($sql, $params);
	}
	
	
}























