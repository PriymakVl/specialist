<?php

class Controller_Debug_States extends Controller_Base {

	public function action_products() 
	{
		$products = OrderProduct::getAll('order_products');
		foreach ($products as $product) {
			$this->editStateProduct($product);
			// $this->editRating($product);
		}
	
	}
	
	private function determineStateProduct($product)
	{
		if (ObjectHelper::checkValuesProperty($product->actions, 'state', OrderActionState::ENDED)) return OrderProduct::STATE_ENDED;
		if (ObjectHelper::checkValuesProperty($product->actions, 'state', OrderActionState::WAITING)) return OrderProduct::STATE_WAITING;
		if (ObjectHelper::checkValuesProperty($product->actions, 'state', OrderActionState::PLANED)) return OrderProduct::STATE_PLANED;
		
		if (ObjectHelper::inPropertyValue($product->actions, 'state', OrderActionState::PROGRESS)) return OrderProduct::STATE_PROGRESS;
		return OrderProduct::STATE_PLANED;
	}
	
	private function editStateProduct($product)
	{
		$product = (new OrderProduct)->setData($product)->getActions();
		$state_prod = $this->determineStateProduct($product);
		$product->setState($state_prod);
		if ($product->id_parent) $this->editStateProduct($product->id_parent);//edit state recursive parents
	}
	
	private function editRating($product)
	{
		if ($product->id_order) $order = (new Order)->getData($product->id_order);
		if (!$order->rating) return;
		debug('dd');
		(new Product)->setData($product)->setRating($order->rating);
		$product = (new OrderProduct)->setData($product)->getActions();
		if (!$product->actions) return;
		foreach ($product->actions as $action) {
			$action->setRating($rating);
		}
	}


}