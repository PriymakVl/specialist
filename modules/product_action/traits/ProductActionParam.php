<?php

trait ProductActionParam {

	public function addDataModelParams() 
	{
		$params = self::selectParams(['symbol', 'name', 'price', 'time_prod', 'time_prepar', 'number']);
		$params['symbol'] = trim($params['symbol']);
		$params['name'] = trim($params['name']);
		return $params;
	}
	
	public function editDataModelParams() 
	{
		$params = self::selectParams(['id_action', 'symbol', 'name', 'price', 'time_prod', 'time_prepar', 'number']);
		$params['symbol'] = trim($params['symbol']);
		$params['name'] = trim($params['name']);
		return $params;
	}
	 
}