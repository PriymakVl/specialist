<?php

trait OrderActionModelState {


	public function getAllNotStateEndedModel()
	{
		$params = $this->getAllNotStateEndedParam();
		$sql = 'SELECT * FROM `order_actions` WHERE `state` <> :state AND `type_order` = :type_order AND `status` = :status ORDER BY `state` DESC, `rating` DESC';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public function getNotReadyActionOrderModel($id_order)
	{
		$params = ['id_order' => $id_order, 'state' => OrderActionState::ENDED, 'status' => STATUS_ACTIVE];
		$sql = 'SELECT * FROM `order_actions` WHERE `state` != :state AND `id_order` = :id_order AND `status` = :status';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public function setStateEndedForAllActionsOrderModel($id_order)
	{
		$sql = 'UPDATE `order_actions` SET `state` = :state WHERE `id_order` = :id_order';
		$params = ['id_order' => $id_order, 'state' => OrderActionState::ENDED];
		return self::perform($sql, $params);
	}
	
	public function getAllForProductNotStateEndedModel($id_prod)
	{
		$params = ['id_prod' => $id_prod, 'state' => OrderActionState::ENDED, 'status' => STATUS_ACTIVE];
		$sql = 'SELECT * FROM `order_actions` WHERE `state` <> :state AND `id_prod` = :id_prod AND `status` = :status';
		return self::perform($sql, $params)->fetchAll();
	}
	
}