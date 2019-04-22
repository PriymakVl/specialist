<?php

trait OrderActionMainState {
	
	use OrderActionProductState, OrderActionTimeState, OrderActionOrderState;

	public function editStateUp()
	{
		$this->updateStateModel();
		$this->setStartTimeState()->editStateProduct()->editStateOrder();
		return $this;
	}
	
	public function editStateDown($state)
	{
		$this->updateStateModel($state);
		$this->setStartTimeStateDown($state);
		return $this;
	}

	
	// public function determineStateByStateOrder($state_order)
	// {
		// switch ($state_order) {
			// case OrderState::REGISTERED: return OrderActionState::WAITING;
			// case OrderState::PREPARATION: return OrderActionState::WAITING;
			// case OrderState::WAITING: return OrderActionState::WAITING;
			// case OrderState::WORK: return OrderActionState::PLANED;
			// case OrderState::MADE: return OrderActionState::ENDED;
		// }
	// }
	
}