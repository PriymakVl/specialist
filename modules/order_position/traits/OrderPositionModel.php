<?php

trait OrderPositionModel {

	use OrderPositionParam;
	
	public function addDataModel()
	{	
		$params = self::selectParams(['id_order', 'symbol', 'qty', 'note']);
        $sql = "INSERT INTO `order_positions` (id_order, symbol, qty, note) VALUES (:id_order, :symbol, :qty, :note)";
        return self::insert($sql, $params);
	}
	
	public function editDataModel()
	{	
		$params = self::selectParams(['id_position', 'symbol', 'qty', 'note']);
        $sql = 'UPDATE `order_positions` SET `symbol` = :symbol, `qty` = :qty, `note` = :note WHERE `id` = :id_position';
        return self::perform($sql, $params);
	}
	
	public function getAllByIdOrderModel($id_order)
	{
		$params = ['id_order' => $id_order, 'status' => STATUS_ACTIVE];
		$sql = 'SELECT * FROM `order_positions` WHERE `id_order` = :id_order AND `status` = :status';
        return self::perform($sql, $params)->fetchAll();
	}
	
	public function setIdProductModel($id_prod)
	{
		$params = ['id_prod' => $id_prod, 'id_position' => $this->id];
		$sql = 'UPDATE `order_positions` SET `id_prod` = :id_prod  WHERE `id` = :id_position';
		return self::perform($sql, $params);
	}

	
}























