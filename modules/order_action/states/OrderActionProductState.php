<?php

trait OrderActionProductState {

	private function determineStateProductWhenChangeStateAction($product)
	{
		$state = $this->get->state ? $this->get->state : $this->post->state;
		if ($this->state == $product->state) return false;
		if (ObjectHelper::checkValuesProperty($product->actions, 'state', OrderActionState::ENDED)) return OrderProduct::STATE_ENDED;
		if (ObjectHelper::checkValuesProperty($product->actions, 'state', OrderActionState::WAITING)) return OrderProduct::STATE_WAITING;
		if ($product->state == OrderProduct::STATE_PLANED && $state == OrderActionState::PROGRESS) return OrderProduct::STATE_PROGRESS;
	}
	
	private function editStateProduct($id_prod = false)
	{
		$id_prod = $id_prod ? $id_prod : $this->id_prod;
		if (!$id_prod) return $this;
		$product = (new OrderProduct)->setData($id_prod)->getActions();
		$state_prod = $this->determineStateProductWheNChangeStateAction($product);
		if ($state_prod) $product->setState($state_prod);
		if ($product->id_parent) $this->editStateProduct($product->id_parent);//edit state recursive parents
		return $this;
	}
	
	

	


}