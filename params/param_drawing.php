<?php

// require_once('param.php');

class ParamDrawing extends Param {
    
	public static function add()
	{
		$keys = ['note', 'id_prod', 'save'];
		$params = self::getAll($keys);
		$params['date_add'] = time();
		return $params;
	}
	
	public static function note()
	{
		$keys = ['note', 'save', 'id_dwg'];
		$params = self::getAll($keys);
		return $params;
	}


	
}