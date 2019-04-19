<?php

trait OrderActionStateModel {
	
	use OrderActionStateParam;

	public function insertModel()
	{
		$params = $this->insertParams();
		$sql = "INSERT INTO `order_action_states` (id_action, time, state, id_user) VALUES (:id_action, :time, :state, :id_user)";
        return self::perform($sql, $params);
	}
	
	public function getByIdActionModel($id_action = false)
	{
		$id_action = $id_action ? $id_action : $this->get->id_action;
		$params = ['id_action' => $id_action, 'status' => STATUS_ACTIVE];
		$sql = 'SELECT * FROM `order_action_states` WHERE `id_action` = :id_action AND `status` = :status';
		return self::perform($sql, $params)->fetchAll();
	}


}