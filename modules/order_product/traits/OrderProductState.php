<?php

trait OrderProductState {

	
	
	public function setStatePreparation($order)
	{
		if ($order->products) return $this;
		$products = (new OrderProductExtract)->getProducts($order);
		if ($products) $this->addProductList($products);//->addActionList($order->id);
		// if ($symbols) return $this->
	}
	
	public function setStateOrder()
	{
		(new OrderState)->check($this->id_order);
		return $this;
	}
	
	public function editState($order)
	{
		if ($order->state == OrderState::PREPARATION) return $this->setStatePreparation($order);
	}
	
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