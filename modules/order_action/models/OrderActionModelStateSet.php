<?php

trait OrderActionModelStateSet {

	public function setStateModel()
	{
		$params = ['state' => $this->get->state, 'id_action' => $this->get->id_action];
		$sql = 'UPDATE `order_actions` SET `state` = :state  WHERE `id` = :id_action';
		return self::perform($sql, $params);
	}
	
	public function setStateWorkerModel()
	{
		$params = $this->setStateWorkerParams();
		$sql = 'UPDATE `order_actions` SET `state` = :state, `id_worker` = :id_worker WHERE `id` = :id_action';
		return self::perform($sql, $params);
	}
	
	// public function setStateForProductModel($params)
	// {
		// $sql = 'UPDATE `order_actions` SET `state` = :state WHERE `id_prod` = :id_prod AND `status` = :status';
		// return self::update($sql, $params);
	// }
	// public function setStateForOrderModel()
	// {
		// $params = $this->setStateForOrderParams();
		// $sql = 'UPDATE `order_actions` SET `state` = :state WHERE `id_order` = :id_order AND `status` = :status';
		// return self::update($sql, $params);
	// }
	
	// public function getOrdersWhereStateActionsNotEndedModel()
	// {
		// $slq = 'SELECT `id_order` FROM `order_actions` WHERE `state` != :state AND `status` = :status GROUP BY `id_order`';
		// $params = ['state' => OrderActionState::ENDED, 'status' => STATUS_ACTIVE];
		// $items = self::perform($slq, $params)->fetchAll();
	// }

}