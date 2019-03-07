<?php

require_once('param.php');

class ParamProductAction extends Param {
    
	public static function add($symbol_prod)
	{
        $keys = ['save', 'number', 'id_data', 'time_prod', 'time_prepar', 'id_prod'];
		$params = self::getAll($keys);
		$params['symbol'] = $symbol_prod;
		return $params;
	}
	
	public static function edit()
	{
        $keys = ['number', 'time_prod', 'time_prepar', 'id', 'save', 'id_data', 'id_prod'];
		$params = self::getAll($keys);
		return $params;
	}

	
}