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
	//for edit base 
	public function setIdProdModel($id_prod)
	{
		$params = ['id' => $this->id, 'id_prod' => $id_prod];
		$sql = 'UPDATE `order_products` SET `id_prod` = :id_prod WHERE `id` = :id';
		return self::update($sql, $params);
	}
	//for edit base 
	public function updateDateExeModel($date_exec)
	{
		$params = ['id' => $this->id, 'date_exec' => $date_exec];
		$sql = 'UPDATE `order_products` SET `date_exec` = :date_exec WHERE `id` = :id';
		return self::update($sql, $params);
	}
	
	//for add from action unplan
	public function addFromActionUnplanModel($params)
	{
        $sql = "INSERT INTO `order_products` (id_order, name, symbol, type, number, note, qty, id_parent, state, type_order, date_exec) 
			VALUES (:id_order, :name, :symbol, :type, :number, :note, :qty, :id_parent, :state, :type_order, :date_exec)";
        return self::insert($sql, $params);
	}
	
	//for edit base
	public function updateIdParentModel($id_parent)
	{
		$params = ['id_parent' => $id_parent, 'id' => $this->id];
		$sql = 'UPDATE `order_products` SET `id_parent` = :id_parent WHERE `id` = :id';
		return self::update($sql, $params);
	}
	
}























