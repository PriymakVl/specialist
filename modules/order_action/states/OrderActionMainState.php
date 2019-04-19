<?php

trait OrderActionMainState {
	
	use OrderActionProductState, OrderActionTimeState, OrderActionCheckState;

	public function editState()
	{
		$this->updateStateModel();
		$this->setStartTimeState();
		return $this;
		// debug();
		return $this->setStartTimeState()->editStateProduct();
	}
	
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
	
}