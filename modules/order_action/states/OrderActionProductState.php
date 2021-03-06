<?php

trait OrderActionProductState {

	private function determineStateProductWhenChangeStateAction($product)
	{
		$state = $this->get->state ? $this->get->state : $this->post->state;
		if (ObjectHelper::checkValuesProperty($product->actions, 'state', OrderActionState::ENDED)) return OrderProduct::STATE_ENDED;
		if (ObjectHelper::checkValuesProperty($product->actions, 'state', OrderActionState::WAITING)) return OrderProduct::STATE_WAITING;
		return OrderProduct::STATE_PROGRESS;
	}
	
	private function editStateProduct($id_prod = false)
	{
		$id_prod = $id_prod ? $id_prod : $this->id_prod;
		$product_data = (new OrderProduct)->getData($id_prod);
		if (!$product_data) return $this;
		$product = (new OrderProduct)->setData($product_data)->getActions();
		$state_prod = $this->determineStateProductWheNChangeStateAction($product);
		if ($state_prod) $product->setState($state_prod);
		if ($product->id_parent) $this->editStateProduct($product->id_parent);//edit state recursive parents
		return $this;
	}
	
	

	


}