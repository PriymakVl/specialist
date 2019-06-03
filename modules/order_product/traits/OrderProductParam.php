<?php

trait OrderProductParam {
	
	public function getParamsFromProduct($product, $id_parent)
	{
		if ($id_parent == self::ID_MAIN_ORDER) $qty = $this->get->qty;
		else {
			$parent = (new OrderProduct)->getData($id_parent);
			$qty = $product->qty * $parent->qty;
		}

		$id_order = $this->get->id_order ? $this->get->id_order : $this->session->id_order_active;
		$order = new Order($id_order);
		$params['name'] = $product->name;
		$params['symbol'] = $product->symbol;
		$params['number'] = $product->number ? $product->number : 0;
		$params['type'] = $product->type;
		$params['note'] = $product->note ? $product->note : '';
		$params['id_parent'] = $id_parent;
		$params['qty'] = $qty;
		$params['state'] = self::STATE_WAITING;
		
		$params['id_order'] = $order->id;
		$params['type_order'] = $order->type;
		$params['date_exec'] = $order->date_exec ? $order->date_exec : '';
		return $params;
	}

	public function getParamsFromPosition()
	{
		$position = (new OrderPosition)->setData($this->get->id_position)->getOrder();
		$params['name'] = $this->get->name ? $this->get->name : 'не указано';
		$params['symbol'] = $position->symbol;
		$params['number'] =  0;
		$params['type'] = Product::TYPE_DETAIL;
		$params['note'] = $position->note ? $position->note : '';
		$params['id_parent'] = self::ID_MAIN_ORDER;
		$params['qty'] = $position->qty ? $position->qty : 1;
		$params['state'] = self::STATE_WAITING;
		
		$params['id_order'] = $position->id_order;
		$params['type_order'] = $position->order->type;
		$params['date_exec'] = $position->order->date_exec ? $position->order->date_exec : '';
		return $params;
	}
	
	public function getParamsFromForm()
	{
		$order = new Order($this->get->id_order);
		$params = self::selectParams(['symbol', 'name', 'qty', 'type', 'note', 'number', 'date_exec']);
		$params['id_parent'] = self::ID_MAIN_ORDER;
		$params['id_order'] = $order->id;
		$params['type_order'] = $order->type;
		$params['date_exec'] = Date::convertStringToTime($params['date_exec']);
		$params['state'] = self::STATE_WAITING;
		return $params;
	}
	
	public function editModelParams()
	{
		$params = self::selectParams(['qty', 'id_prod', 'symbol', 'name', 'type', 'number', 'note', 'date_exec']);
		$params['date_exec'] = Date::convertStringToTime($params['date_exec']);
		if (!self::getParam('id_parent')) $params['id_parent'] = 0;
		return $params;
	}
	
	public function getAllNotStateEndedParam()
	{
		$params['type_order'] = $this->get->type_order;
		$params['state'] = OrderProduct::STATE_ENDED;
		$params['status'] = STATUS_ACTIVE;
		return $params;
	}

	

	
}