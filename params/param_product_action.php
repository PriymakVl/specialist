<?php

require_once('param.php');

class ParamProductAction extends Param {
    
	public static function add($symbol_prod)
	{
        $keys = ['number', 'id_action', 'time_prod', 'time_prepar'];
		$params = self::getAll($keys);
		$params['symbol'] = $symbol_prod;
		return $params;
	}
	
	public static function edit()
	{
        $keys = ['number', 'time_prod', 'time_prepar', 'id_prod_action'];
		$params = self::getAll($keys);
		return $params;
	}

	
}