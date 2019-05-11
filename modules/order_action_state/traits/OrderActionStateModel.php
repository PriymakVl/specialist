<?php

trait OrderActionStateModel {
	
	use OrderActionStateParam;

	public function addModel($params = false)
	{
		$params = $params ? $params : $this->addParams();
		$sql = "INSERT INTO `order_action_states` (id_action, time, state, id_user) VALUES (:id_action, :time, :state, :id_user)";
        return self::perform($sql, $params);
	}
	
	//when edit product
	public function addDownModel($state, $id_action)
	{
		$params = ['state' => $state, 'id_action' => $id_action, 'id_user' => $this->session->id_user, 'time' => time()];
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
	
	public function getIdUsersActionModel($id_action)
	{
		$params = ['id_action' => $id_action, 'status' => STATUS_ACTIVE];
		$sql = 'SELECT `id_user` FROM `order_action_states` WHERE `id_action` = :id_action AND `status` = :status  GROUP BY `id_user`';	
		return self::perform($sql, $params)->fetchAll(PDO::FETCH_COLUMN);
	}


}