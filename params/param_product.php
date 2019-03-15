<?php

require_once('param.php');

class ParamProduct extends Param {
    
	public static function add()
	{
		$keys = ['symbol', 'name', 'quantity', 'id_parent', 'type', 'note', 'number', 'save'];
		$params = self::getAll($keys);
		if (empty($params['quantity'])) $params['quantity'] = 1;
		if (empty($params['number'])) $params['number'] = 1;
		return $params;
	}
	
	public static function edit($product)
	{
		$keys = ['symbol', 'name', 'quantity', 'id_parent', 'type', 'note', 'edit_all', 'save', 'id', 'edit_all', 'number'];
		$params = self::getAll($keys);
		if (empty($params['quantity'])) $params['quantity'] = 1;
		if (empty($params['number'])) $params['number'] = 1;
		$params['symbol_old'] = $product->symbol;
		return $params;
	}
	
	public static function copy()
	{
		$product = new Product(self::get('id_prod'));
		$params['symbol'] = $product->symbol;
		$params['name'] = $product->name;
		$params['quantity'] = $product->quantity;
		$params['type'] = $product->type ? $product->type : Product::TYPE_DETAIL;
		$params['note'] = $product->note ? $product->note : '';
		$params['id_parent'] = Session::get('product-active');
		$params['number'] = 1;
		return $params;
	}
	
}