<?php

trait OrderProductModelSelect {

	public function getAllBySymbolModel($symbol)
	{
		$sql = 'SELECT * FROM `order_products` WHERE `symbol` = :symbol AND `status` = :status ORDER BY `id` DESC';
        $params = ['symbol' => $symbol, 'status' => STATUS_ACTIVE];
        return self::perform($sql, $params)->fetchAll();
	}
	
	public function getByIdParentModel($id_parent = false)
	{
		$sql = 'SELECT * FROM `order_products` WHERE `status` = :status AND `id_parent` = :id_parent';
        $params = ['status' => STATUS_ACTIVE, 'id_parent' => $id_parent ? $id_parent : $this->id];
        return self::perform($sql, $params)->fetchAll();
	}
	
	public function getByIdOrderModel($id_order = false)
	{
		$id_order = $id_order ? $id_order : $this->get->id_order;
		$params = ['id_order' => $id_order, 'status' => STATUS_ACTIVE];
		$sql = 'SELECT * FROM `order_products` WHERE `id_order` = :id_order AND `status` = :status ORDER BY state DESC, rating DESC, date_exec DESC';
		return self::perform($sql, $params)->fetchAll();
	}
	
	
	
}