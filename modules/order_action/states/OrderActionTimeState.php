<?php

trait OrderActionTimeState {

	private function setStartTimeState()
	{
		(new OrderActionState)->add();
		return $this;
	}
	
	private function setStartTimeStateDown($state)
	{
		(new OrderActionState)->addDown($state, $this->id);
		return $this;
	}

}