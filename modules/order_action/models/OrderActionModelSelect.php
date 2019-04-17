<?php

trait OrderActionModelSelect {

	public function getAllByIdOrderModel()
	{
		$params = ['id_order' => $this->get->id_order, 'status' => STATUS_ACTIVE];
		$sql = 'SELECT * FROM `order_actions` WHERE`id_order` = :id_order AND `status` = :status';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public function getAllByIdProductModel()
	{
		$params = ['id_prod' => $this->get->id_prod, 'status' => STATUS_ACTIVE];
		$sql = 'SELECT * FROM `order_actions` WHERE `id_prod` = :id_prod AND `status` = :status';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public function getAllByIdWorker($params)
	{
		$sql = 'SELECT * FROM `order_actions` WHERE `id_worker` = :id_worker AND `status` = :status';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public function getByActionName()
	{
		$slq = 'SELECT * FROM `order_actions` WHERE `name` = :action AND  AND `status` = :status';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public function getByTypeOrder()
	{
		$params = ['type_order' => $this->getTypeOrderParam(), 'status' => STATUS_ACTIVE];
		$sql = 'SELECT * FROM `order_actions` WHERE `type_order` = :type_order AND `status` = :status';
		return self::perform($sql, $params)->fetchAll();
	}
	
	

}