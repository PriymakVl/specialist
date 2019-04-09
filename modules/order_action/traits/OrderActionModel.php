<?php

trait OrderActionModel {
	
	
	
	// public function getForTerminalModel()
	// {
		// if ($params['action'] == 'all' && $params['order'] == 'all') $ids = self::getAllNotReadyActions($params);
		// else if ($params['action'] != 'all' && $params['order'] == 'all' )$ids = self::getForAllOrders($params);
		// else $ids = self::getForOneOrder($params);
		// return self::createArrayActions($ids);
	// }
	
	public function getForAllOrdersModel()
	{
		$params = self::selectParams(['action', 'state', 'type_order', 'status']);
		$sql = 'SELECT `id` FROM `order_actions` 
		WHERE `id_data` = :action AND `state` != :state AND `type_order` = :type_order AND `status` = :status ORDER BY `rating` DESC';
		return self::perform($sql, $params)->fetchAll();
	}
	
	// public function getForOneOrder()
	// {
		// unset($params['type_order']);
		// if ($params['action'] == 'all') {
			// $where = 'WHERE `state` != :state AND `id_order` = :order AND `status` = :status ORDER BY `rating` DESC, `state` DESC'; 
			// unset($params['action']);
		// }
		// else $where = 'WHERE `id_data` = :action AND `state` != :state AND `id_order` = :order AND `status` = :status ORDER BY `rating` DESC, `state` DESC';
		// $sql = 'SELECT `id` FROM `order_actions` '.$where;
		// return self::perform($sql, $params)->fetchAll();
	// }
	
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
	
	public function planWorkerModel($params)
	{
		$sql = 'SELECT * FROM `order_actions` WHERE `id_data` IN ('.$params['default_actions'].') AND `state` != :state AND `status` = :status';
		unset($params['default_actions']);
		return self::perform($sql, $params)->fetchAll();
	}
	
	public function madeWorkerModel($params)
	{
		$slq = 'SELECT * FROM `order_actions` 
		WHERE `id_worker` = :id_worker AND `state` = :state AND `time_end` BETWEEN :period_start AND :period_end AND `status` = :status';
		return self::perform($slq, $params)->fetchAll();
	}
	
	// public function getIdActionsByIdOrder($id_order)
	// {
		// $slq = 'SELECT * FROM `order_actions` WHERE `id_order` = :id_order AND `status` = :status';
		// $params = ['id_order' => $id_order, 'status' => STATUS_ACTIVE];
		// return self::perform($slq, $params)->fetchAll();
	// }
	
	public function addNoteModel()
	{
		$params = self::selectParams(['id', 'note']);
		$sql = 'UPDATE `order_actions` SET `note` = :note WHERE `id` = :id';
		return self::perform($sql, $params);
	}
	
	public function updateRatingOrderModel($id_order, $rating)
	{
		$sql = 'UPDATE `order_actions` SET `rating` = :rating WHERE `id_order` = :id_order';
		$params = ['rating' => $rating, 'id_order' => $id_order];
		return self::perform($sql, $params);
	}
	
	public function editModel()
	{
		$params = $this->editModelParams();
		$sql = 'UPDATE `order_actions` SET `qty` = :qty , `name` = :name, `price` = :price, `number` = :number, `state` = :state, `time_prepar` = :time_prepar,
			`time_prod` = :time_prod, `rating` = :rating, `note` = :note WHERE `id` = :id_action';
		return self::perform($sql, $params);
	}
	
	
	
	
}























