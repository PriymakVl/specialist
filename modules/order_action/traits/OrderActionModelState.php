<?php

trait OrderActionModelState {


	public function getAllNotReadyActionsModel()
	{
		$params = self::selectParams(['state', 'type_order', 'status']);
		$sql = 'SELECT `id` FROM `order_actions` WHERE `state` != :state AND `type_order` = :type_order AND `status` = :status ORDER BY `rating` DESC, `state` DESC';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public function setStateModel()
	{
		$params = self::selectParams(['state', 'id_worker', 'id_action']);
		$sql = 'UPDATE `order_actions` SET `state` = :state, `id_worker` = :id_worker WHERE `id` = :id_action';
		return self::perform($sql, $params);
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
	
	public function getOrdersWhereStateActionsNotEndedModel()
	{
		$slq = 'SELECT `id_order` FROM `order_actions` WHERE `state` != :state AND `status` = :status GROUP BY `id_order`';
		$params = ['state' => OrderActionState::ENDED, 'status' => STATUS_ACTIVE];
		$items = self::perform($slq, $params)->fetchAll();
	}
	
		
	public function setStateAsInOrderModel($params)
	{
		$sql = 'UPDATE `order_actions` SET `state` = :state WHERE `id_order` = :id_order AND `status` = :status';
		return self::update($sql, $params);
	}


}