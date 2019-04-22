<?php

trait OrderActionProductState {

	private function determineStateProductWhenChangeStateAction($product)
	{
		if ($this->get->state == $product->state) return false;
		if (ObjectHelper::checkValuesProperty($product->actions, 'state', OrderActionState::ENDED)) return OrderProduct::STATE_ENDED;
		if (ObjectHelper::checkValuesProperty($product->actions, 'state', OrderActionState::WAITING)) return OrderProduct::STATE_WAITING;
		if ($product->state == OrderProduct::STATE_PLANED && $this->get->state == OrderActionState::PROGRESS) return OrderProduct::STATE_PROGRESS;
	}
	
	private function editStateProduct()
	{
		if (!$this->id_prod) return $this;
		$product = (new OrderProduct)->setData($this->id_prod)->getActions();
		$state_prod = $this->determineStateProductWheNChangeStateAction($product);
		if ($state_prod) $product->setState($state_prod);
		return $this;
	}
	

	


}