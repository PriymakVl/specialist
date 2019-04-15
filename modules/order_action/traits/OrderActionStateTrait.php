<?php

trait OrderActionStateTrait {

	public function editState($params)
	{
		
		$this->setTimeState()->setStateModel($params);
		return $this;
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
	
	public function setStateAsInOrder($id_order, $state_order)
	{
		$state = $this->setStateByStateOrder($state_order);
		$params = ['id_order' => $id_order, 'state' => $state, 'status' =>STATUS_ACTIVE];
		$this->setStateAsInOrderModel($params);
		// OrderActionState::add($params);
		return $this;
	}
	
	private function setStateByStateOrder($state_order)
	{
		switch ($state_order) {
			case OrderState::REGISTERED: return OrderActionState::WAITING;
			case OrderState::PREPARATION: return OrderActionState::WAITING;
			case OrderState::WORK: return OrderActionState::PLANED;
			case OrderState::MADE: return OrderActionState::ENDED;
		}
	}
	
	public function editStateForProduct($id_prod, $state)
	{
		$params = ['id_prod' => $id_prod, 'state' => $state, 'status' =>STATUS_ACTIVE];
		$this->setStateForProductModel($params);
		// OrderActionState::add($params);
		return $this;
	}
	
	private function setTimeState()
	{
		(new OrderActionState)->add();
		return $this;
	}


}