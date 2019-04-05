<?php

trait OrderActionState {

	public function editState($params)
	{
		OrderActionState::add($params);
		self::setStateModel($params);
		return $this;
	}
	
	public function isStates()
	{
		$params = ['id_action' => $this->id, 'type' => 'base', 'status' => STATUS_ACTIVE];
		$items = OrderActionState->getAllByIdAction($params);
		if ($items) $this->states = true;
		return $this;
	}
	
	public function getAllStates($params)
	{
		$items = OrderActionState::getAllByIdAction($params);
		foreach ($items as $item) {
			$state = new OrderActionState($item->id);
			$state->setDuration($items)->getWorker()->setName()->setBg();
			$this->states[] = $state;
		}
		return $this;
	}

}