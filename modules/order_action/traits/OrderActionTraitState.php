<?php

trait OrderActionTraitState {
	
	use OrderActionDetermineStateProduct;

	public function editState()
	{
		$this->setStateModel();
		return $this->setTimeState()->setStateProduct();
	}
	
	public function editStateWorker()
	{
		$this->setTimeState()->setStateWorkerModel($params);
		return $this;
	}
	
	public function isStates()
	{
		$params = ['id_action' => $this->id, 'type' => 'base', 'status' => STATUS_ACTIVE];
		$items = (new OrderActionState)->getAllByIdAction($params);
		if ($items) $this->states = true;
		return $this;
	}
	
	public function getAllStates($params)
	{
		$items = (new OrderActionState)->getAllByIdAction($params);
		foreach ($items as $item) {
			$state = new OrderActionState($item->id);
			$state->setDuration($items)->getWorker()->setName()->setBg();
			$this->states[] = $state;
		}
		return $this;
	}
	
	// public function setStateAsInOrder($id_order, $state_order)
	// {
		// $state = $this->setStateByStateOrder($state_order);
		// $params = ['id_order' => $id_order, 'state' => $state, 'status' =>STATUS_ACTIVE];
		// $this->setStateAsInOrderModel($params);
		// OrderActionState::add($params);
		// return $this;
	// }
	
	public function determineStateByStateOrder($state_order)
	{
		switch ($state_order) {
			case OrderState::REGISTERED: return OrderActionState::WAITING;
			case OrderState::PREPARATION: return OrderActionState::WAITING;
			case OrderState::WAITING: return OrderActionState::WAITING;
			case OrderState::WORK: return OrderActionState::PLANED;
			case OrderState::MADE: return OrderActionState::ENDED;
		}
	}
	
	// public function editStateActionsWhenChangeStateProduct()
	// {
		// $items = $this->getAllByIdProductNotStateEndedModel();
		// if (empty($items)) return;
		// foreach ($items as $item)
		// {
			// (new self)->setData($item)->setState($this->get->state);
		// }
	// }
	
	private function setTimeState()
	{
		// (new OrderActionState)->add();
		return $this;
	}
	
	private function setStateProduct()
	{
		$product = (new OrderProduct)->setData($this->id_prod);
		if ($product->state == $this->get->state) return $this;
		$state_prod = $this->determineStateProductWhereChangeStateAction($product->id);
		$product->setState($state_prod);
		return $this;
	}
	

}