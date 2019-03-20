<?php

trait OrderContentParam {
	
	
	public static function getParams($method_name, $keys)
	{
		$method_name = $method_name.'Param';
		$params = self::$method_name($keys);
	}
	
	public static function selectParams($keys, $params_all = false) 
	{
		if (empty($params_all)) $params_all = $_REQUEST;
		$params = [];
        foreach ($keys as $key) {
            if (isset($params_all[$key])) $params[$key] = $params_all[$key];
        }
        return $params;
	}
	
	public static function getAllForParentModel($keys)
	{
		$params = self;:selectParams($keys);
		$params['status'] = Model::STATUS_ACTIVE;
		return $params;
	}
	
}