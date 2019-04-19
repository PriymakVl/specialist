<?php

trait OrderProductState {

	public function editState()
	{
		$this->setState($this->get->state);
		$this->editStateActions();
		return $this;
	}
	
	public function editStateActions()
	{
		$items = (new OrderAction)->getByIdProductModel($this->id);
		foreach ($items as $item) {
			if ($item->state == OrderActionState::PLANED || $item->state == OrderActionState::WAITING) (new OrderAction)->setData($item)->setState($this->get->state);
		}
		return $this;
	}
	
	public function determineStateByStateOrder($state)
	{
		switch ($state) {
			case OrderState::REGISTERED: return self::STATE_WAITING;
			case OrderState::PREPARATION: return self::STATE_WAITING;
			case OrderState::WORK: return self::STATE_PLANED;
			case OrderState::MADE: return self::STATE_ENDED;
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