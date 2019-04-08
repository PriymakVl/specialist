<?php

trait OrderActionParam {

	// use Param;
	
	public function addDataModelParams($action, $product) {
		$order = new Order( $this->session->id_order_active);
		$params['id_order'] = $order->id;
		$params['type_order'] = $order->type;
		
		$params['id_prod'] = $product->id;
		$params['qty'] = $product->qty;
		
		
		$params['name'] = $action->name; //for get options action
		$params['note'] = $action->note;
		$params['time_prepar'] = $action->time_prepar;//time preparation
		$params['time_prod'] = $action->time_prod; //time production
		$params['number'] = $action->number;
		$params['price'] = $action->price;
		
		$params['state'] = OrderActionState::WAITING;
		$params['rating'] = self::RATING_DEFAULT;
		return $params;
	}
	
}























