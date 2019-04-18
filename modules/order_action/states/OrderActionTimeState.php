<?php

trait OrderActionTimeState {

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
	
	private function setStartTimeState()
	{
		// (new OrderActionState)->add();
		return $this;
	}
}