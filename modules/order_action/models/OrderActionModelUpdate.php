<?php

trait OrderActionModelUpdate {

	public function updateStateModel($state = false)
	{
		$state = $state ? $state : $this->get->state;
		$id_action = $this->get->id_action ? $this->get->id_action : $this->id;
		$params = ['state' => $state, 'id_action' => $id_action];
		$sql = 'UPDATE `order_actions` SET `state` = :state  WHERE `id` = :id_action';
		return self::perform($sql, $params);
	}
	
	public function updateNoteModel()
	{
		$params = self::selectParams(['id_action', 'note']);
		$sql = 'UPDATE `order_actions` SET `note` = :note WHERE `id` = :id_action';
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
	
	private function updateIdWorkerModel()
	{
		$params = ['id_action' => $this->get->id_action, 'id_worker' => $this->post->id_worker];
		$sql = 'UPDATE `order_actions` SET `id_worker` = :id_worker WHERE `id` = :id_action';
		return self::perform($sql, $params);
	}
	
	public function updateDateEndModel($date_end = false)
	{
		$date_end = $date_end ? $date_end : time(); 
		$params = ['id_action' => $this->id, 'date_end' => $date_end];
		$sql = 'UPDATE `order_actions` SET `date_end` = :date_end WHERE `id` = :id_action';
		return self::perform($sql, $params);
	}
	//for transfer from the old base
	public function updateIdProdOrderModel($params)
	{
		$sql = 'UPDATE `order_actions` SET `id_prod_ord` = :id_prod_ord WHERE `id` = :id_action';
		return self::perform($sql, $params);
	}
	//for transfer from the old base
	public function updateDateExeModel($date_exec)
	{
		$params = ['id_action' => $this->id, 'date_exec' => $date_exec];
		$sql = 'UPDATE `order_actions` SET `date_exec` = :date_exec WHERE `id` = :id_action';
		return self::perform($sql, $params);
	}
	
	//for edit base 
	public function updateTimeModel($data)
	{
		$params = ['id_action' => $this->id, 'time_prepar' => $data->time_prepar, 'time_prod' => $data->time_prod];
		$sql = 'UPDATE `order_actions` SET `time_prepar` = :time_prepar, time_prod = :time_prod WHERE `id` = :id_action';
		return self::perform($sql, $params);
	}


}