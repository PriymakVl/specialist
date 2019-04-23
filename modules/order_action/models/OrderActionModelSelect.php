<?php

trait OrderActionModelSelect {

	public function getByIdOrderModel($id_order = false)
	{
		$id_order = $id_order ? $id_order : $this->get->id_order;
		$params = ['id_order' => $id_order, 'status' => STATUS_ACTIVE];
		$sql = 'SELECT * FROM `order_actions` WHERE`id_order` = :id_order AND `status` = :status ORDER BY state, rating DESC, date_exec';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public function getByIdProductModel($id_prod = false)
	{
		$id_prod = $id_prod ? $id_prod : $this->get->id_prod;
		$params = ['id_prod' => $id_prod, 'status' => STATUS_ACTIVE];
		$sql = 'SELECT * FROM `order_actions` WHERE `id_prod` = :id_prod AND `status` = :status ORDER BY state, rating DESC, date_exec';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public function getByIdWorkerModel($params)
	{
		$sql = 'SELECT * FROM `order_actions` WHERE `id_worker` = :id_worker AND `status` = :status ORDER BY state, rating DESC, date_exec';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public function getByActionNameModel($name)
	{
		$params = ['name' => $name, 'status' => STATUS_ACTIVE, 'type_order' => $this->getTypeOrderParam()];
		$sql = 'SELECT * FROM `order_actions` WHERE `name` = :name AND `status` = :status AND `type_order` = :type_order ';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public function getByTypeOrderModel()
	{
		$params = ['type_order' => $this->getTypeOrderParam(), 'status' => STATUS_ACTIVE];
		$sql = 'SELECT * FROM `order_actions` WHERE `type_order` = :type_order AND `status` = :status ORDER BY state, rating DESC, date_exec';
		return self::perform($sql, $params)->fetchAll();
	}
	
	

}