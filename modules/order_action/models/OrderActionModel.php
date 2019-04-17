<?php

trait OrderActionModel {
	
	use OrderActionModelInsert, OrderActionModelSelect, OrderActionParam;
	
	
	
	// public function getAllByIdProductNotStateEndedModel($id_prod)
	// {
		// $params = ['id_prod' => $id_prod, 'status' => STATUS_ACTIVE, 'state' => OrderActionState::ENDED];
		// $sql = 'SELECT * FROM `order_actions` WHERE `id_prod` = :id_prod AND `status` = :status AND `state` <> :state';
		// return self::perform($sql, $params)->fetchAll();
	// }
	
	// public function planWorkerModel($params)
	// {
		// $sql = 'SELECT * FROM `order_actions` WHERE `id_data` IN ('.$params['default_actions'].') AND `state` != :state AND `status` = :status';
		// unset($params['default_actions']);
		// return self::perform($sql, $params)->fetchAll();
	// }
	
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























