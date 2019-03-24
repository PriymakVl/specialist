<?php

trait Param {

 public static function getParam($key, $default = false)
    {
        if (empty($_REQUEST[$key])) return $default;
        return $_REQUEST[$key];
    }

    public static function getParams($params = false)
    {
        if (!$params) $params = array_merge($_REQUEST, $_SESSION);
		$params['status'] = STATUS_ACTIVE;
		return json_decode(json_encode($params), FALSE);
    }
	
	public static function getParamsAsArray()
    {
        $params = array_merge($_REQUEST, $_SESSION);
		$params['status'] = STATUS_ACTIVE;
		return $params;
    }

    public static function getIds($key)
    {
        if (empty($_REQUEST[$key])) exit('параметр '.$key.' не существует');
        $str = $_REQUEST[$key];
        return explode(',', rtrim($str, ','));
    }
	
	public static function selectParams($keys, $params = false) 
	{
		if (empty($keys)) throw new Exception('Нет массива ключей');
		if (!is_array($keys)) throw new Exception('Ключи не являются массивом');
		if (!$params) $params = self::getAllAsArray();
		$select = [];
        foreach ($keys as $key) {
            if (isset($params[$key])) $select[$key] = $params[$key];
        }
        return $select;
	}
}