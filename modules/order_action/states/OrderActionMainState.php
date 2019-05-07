<?php

trait OrderActionMainState {
	
	use OrderActionProductState, OrderActionTimeState, OrderActionOrderState;
	
	public function isStates()
	{
		$items = (new OrderActionState)->getByIdActionModel($this->id);
		if ($items) $this->isStates = true;
		return $this;
	}
	
	public function getStates()
	{
		$this->states = (new OrderActionState)->getForAction($this->id);
		return $this;
	}

	public function editStateUp()
	{
		$this->updateStateModel();
		$this->setStartTimeState()->editStateProduct()->editStateOrder()->editDateEnd();
		return $this;
	}
	
	public function editStateDown($state)
	{
		$this->updateStateModel($state);
		$this->setStartTimeStateDown($state);
		$this->editDateEnd($state);
		return $this;
	}
	
}