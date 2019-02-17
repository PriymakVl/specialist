<?php

require_once('param.php');

class ParamProduct extends Param {
    
	public static function addProduct()
	{
		$keys = ['symbol', 'name', 'quantity', 'id_parent', 'type', 'note'];
		$params = self::getAll($keys);
		return $params;
	}
	
	public static function editProduct()
	{
		$keys = ['symbol', 'name', 'quantity', 'id_parent', 'type', 'note'];
		$params = self::getAll($keys);
		$params['status'] = Model::STATUS_ACTIVE;
		return $params;
	}
	
	public static function copyProduct()
	{
		$product = new Product(self::get('id_prod'));
		$params['symbol'] = $product->symbol;
		$params['name'] = $product->name;
		$params['quantity'] = $product->quantity;
		$params['type'] = $product->type ? $product->type : 4;
		$params['note'] = $product->note ? $product->note : '';
		$params['id_parent'] = Session::get('product-active');
		return $params;
	}
	
}