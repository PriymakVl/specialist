<?php

trait OrderActionModelUpdate {

	public function updateStateModel()
	{
		$params = ['state' => $this->get->state, 'id_action' => $this->get->id_action];
		$sql = 'UPDATE `order_actions` SET `state` = :state  WHERE `id` = :id_action';
		return self::perform($sql, $params);
	}
	
	public function updateNoteModel()
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
	
	public function updateModel()
	{
		$params = $this->updateModelParams();
		$sql = 'UPDATE `order_actions` SET `qty` = :qty , `name` = :name, `price` = :price, `number` = :number, `state` = :state, `time_prepar` = :time_prepar,
			`time_prod` = :time_prod, `rating` = :rating, `note` = :note WHERE `id` = :id_action';
		return self::perform($sql, $params);
	}


}