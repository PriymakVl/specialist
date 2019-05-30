<?php

trait ProductActionParam {

	public function addDataModelParams() 
	{
		$params = self::selectParams(['symbol', 'name', 'price', 'time_prod', 'time_prepar', 'number', 'note']);
		$params['symbol'] = trim($this->get->symbol);
		$params['name'] = trim($params['name']);
		return $params;
	}
	
	public function editDataModelParams() 
	{
		$params = self::selectParams(['id_action', 'name', 'price', 'time_prod', 'time_prepar', 'number', 'note']);
		$params['name'] = trim($params['name']);
		return $params;
	}

	public function getParamsForCopy($action)
	{
		$product = new Product($this->session->id_prod_active);
		if (!$product) throw new Exception("Нет данных на активынй продукт");
		$params['symbol'] = $product->symbol;
		$params['name'] = $action->name;
		$params['price'] = $action->price;
		$params['time_prod'] = $action->time_prod;
		$params['time_prepar'] = $action->time_prepar;
		$params['number'] = $action->number;
		$params['note'] = $action->note;
		return $params;
	}
	 
}