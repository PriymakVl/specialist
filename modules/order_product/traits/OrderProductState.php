<?php

trait OrderProductState {

	//when edit order
	public function editStateDown($state = false)
	{
		$state = $state ? $state : $this->get->state;
		$this->setState($state);
		$this->editStateActions($state);
		return $this;
	}
	
	public function editStateActions($state)
	{
		$items = (new OrderAction)->getByIdProductModel($this->id);
		foreach ($items as $item) {
			if ($item->state == OrderActionState::PLANED || $item->state == OrderActionState::WAITING) (new OrderAction)->setData($item)->editStateDown($state);
		}
		return $this;
	}
	
	public function determineStateByStateOrder($state)
	{
		switch ($state) {
			case OrderState::REGISTERED: return self::STATE_WAITING;
			case OrderState::PREPARATION: return self::STATE_WAITING;
			case OrderState::PLANED: return self::STATE_PLANED;
			case OrderState::WORK: return self::STATE_PROGRESS;
			case OrderState::MADE: return self::STATE_ENDED;
			case OrderState::WAITING: return self::STATE_WAITING;
		}
	}
	
	public function checkState()
	{
		if (!$this->actions || $this->checkStateActions(OrderActionState::WAITING)) $this->setState(self::STATE_WAITING);
		else if ($this->checkStateActions(OrderActionState::ENDED)) $this->setState(self::STATE_ENDED);
		else if ($this->checkStateActions(OrderActionState::STOPPED)) $this->setState(self::STATE_STOPPED);
		else $this->setState(self::STATE_PROGRESS);
		return $this;
	}

	

}