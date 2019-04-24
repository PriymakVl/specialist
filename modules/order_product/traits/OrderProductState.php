<?php

trait OrderProductState {

	public function editStateUpAndDown($state = false)
	{
		$state = $state ? $state : $this->get->state;
		$this->setState($state);
		$this->editStateActions($state);
		$this->editStateOrder($state);
		$this->editStateSpecification($state);
		return $this;
	}
	
	public function editStateDown($state = false)
	{
		$state = $state ? $state : $this->get->state;
		$this->setState($state);
		$this->editStateActions($state);
		$this->editStateSpecification($state);
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
	
	public function editStateSpecification($state) 
	{
		$this->getSpecificationAll();
		if (!$this->specificationAll) return;
		foreach ($this->specificationAll as $product) {
			
			$product->editStateActions($state)->setState($state);
		}
	}
	
	public function editStateOrder($state)
	{
		$state_order = (new OrderState)->determine($this->id_order);
		if ($state_order) (new Order)->setData($this->id_order)->setState($state_order);
		return $this;
	}

	

}