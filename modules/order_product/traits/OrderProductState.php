<?php

trait OrderProductState {

	
	
	// public function setStatePreparation($order)
	// {
		// if ($order->products) return $this;
		// $products = (new OrderProductExtract)->getProducts($order);
		// if ($products) $this->addProductList($products);//->addActionList($order->id);
	// }
	
	public function setStateAsInOrder($id_order, $state_order)
	{
		$state = $this->setStateByStateOrder($state_order);
		$params = ['id_order' => $id_order, 'state' => $state, 'status' =>STATUS_ACTIVE];
		$this->setStateAsInOrderModel($params);
		return $this;
	}
	
	private function setStateByStateOrder($state_order)
	{
		switch ($state_order) {
			case OrderState::REGISTERED: return self::STATE_WAITING;
			case OrderState::PREPARATION: return self::STATE_WAITING;
			case OrderState::WORK: return self::STATE_PROGRESS;
			case OrderState::MADE: return self::STATE_ENDED;
		}
	}
	
	public function setStateAsInOrderModel($params)
	{
		$sql = 'UPDATE `order_products` SET `state` = :state WHERE `id_order` = :id_order AND `status` = :status';
		return self::update($sql, $params);
	}
	
	// public function editState($order)
	// {
		// if ($order->state == OrderState::PREPARATION) return $this->setStatePreparation($order);
	// }
	
	public function checkState()
	{
		if (!$this->actions || $this->checkStateActions(OrderActionState::WAITING)) $this->setState(self::STATE_WAITING);
		else if ($this->checkStateActions(OrderActionState::ENDED)) $this->setState(self::STATE_ENDED);
		else if ($this->checkStateActions(OrderActionState::STOPPED)) $this->setState(self::STATE_STOPPED);
		else $this->setState(self::STATE_PROGRESS);
		return $this;
	}
	
	private function checkStateActions($state)
	{
		foreach ($this->actions as $action) {
			if ($action->state != $state) return false;
		}
		return true;
	}
	

}