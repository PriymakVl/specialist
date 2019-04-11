<?php

trait OrderProductParam {
	
	public function addDataModelParams($product, $id_parent)
	{
		$params['name'] = $product->name;
		$params['symbol'] = $product->symbol;
		$params['number'] = $product->number ? $product->number : 0;
		$params['type'] = $product->type;
		$params['note'] = $product->note ? $product->note : '';
		$params['id_parent'] = $id_parent;
		$params['qty'] = $product->qty * $this->get->qty;
		$params['state'] = self::STATE_WAITING;
		$params['id_order'] = $this->get->id_order ? $this->get->id_order : $this->session->id_order_active;
		return $params;
	}
	
	public function addFormModelParams()
	{
		$params = self::selectParams(['symbol', 'name', 'qty', 'type', 'note', 'number']);
		$params['id_parent'] = self::ID_MAIN_PARENT;
		$params['id_order'] = $this->get->id_order;
		$params['state'] = self::STATE_WAITING;
		return $params;
	}
	
	public function editModelParams()
	{
		$params = self::selectParams(['qty', 'id_prod', 'state', 'symbol', 'name', 'type', 'number', 'note']);
		if (!self::getParam('id_parent')) $params['id_parent'] = 0;
		return $params;
	}
	

	
}