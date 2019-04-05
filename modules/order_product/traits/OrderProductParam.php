<?php

trait OrderProductParam {
	
	public function addModelParams($product, $id_parent)
	{
		$params['name'] = $product->name;
		$params['symbol'] = $product->symbol;
		$params['number'] = $product->number ? $product->number : 0;
		$params['type'] = $product->type;
		$params['note'] = $product->note ? $product->note : '';
		$params['id_parent'] = $id_parent;
		$params['qty'] = $product->qty * $this->get->qty;
		$params['state'] = self::STATE_WAITING;
		$params['id_order'] = $this->session->id_order_active;
		return $params;
	}
	
	public function addSpecificationParams()
	{
		
	}
}