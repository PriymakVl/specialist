<?php

class Controller_Debug_Rating extends Controller_Base {

	public function action_edit() 
	{
		$orders = OrderProduct::getAll('orders');
		$number = 0;
		foreach ($orders as $order) {
			if ($order->rating > 0) {
				$this->editRatingProducts($order);
				$this->editRatingActions($order);
				$number++;
			}
		}
		debug($number);
	}
	
	private function editRatingProducts($order)
	{
		$products = (new OrderProduct)->getByIdOrderModel($order->id);
		if (!$products) return;
		foreach ($products as $product) {
			(new OrderProduct)->setData($product)->setRating($order->rating);
		}
	}
	
	private function editRatingActions($order)
	{
		$actions = (new OrderAction)->getByIdOrderModel($order->id);
		if (!$actions) return;
		foreach ($actions as $action) {
			(new OrderProduct)->setData($action)->setRating($order->rating);
		}
	}


}