<?php

trait OrderActionTimeState {

	private function setStartTimeState()
	{
		(new OrderActionState)->add();
		return $this;
	}
	
	public function isStates()
	{
		$items = (new OrderActionState)->getByIdActionModel($this->id);
		if ($items) $this->isStates = true;
		return $this;
	}
	
	public function getStates()
	{
		$this->states = (new OrderActionState)->get();
		return $this;
	}
}