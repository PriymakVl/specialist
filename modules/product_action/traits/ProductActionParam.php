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
	 
}