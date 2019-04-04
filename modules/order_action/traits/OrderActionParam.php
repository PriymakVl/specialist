<?php

trait OrderActionParam {

	// use Param;
	
	public function addOneParam($action, $product) {
		$order = new Order( $this->session->id_order_active);
		$params['id_order'] = $order->id;
		$params['type_order'] = $order->type;
		
		$params['id_prod'] = $product->id;
		$params['qty'] = $product->qty;
		
		$params['id_data'] = $action->id_data; //for get options action
		$params['note'] = $action->note;
		$params['time_prepar'] = $action->time_prepar;//time preparation
		$params['time_prod'] = $action->time_prod; //time production
		
		$params['rating'] = 1;//$product->rating;
		$params['state'] = OrderActionState::WAITING;
		return $params;
	}
	
}























