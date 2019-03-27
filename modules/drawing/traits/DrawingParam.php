<?php

trait DrawingParam {

	use Param;
	
	public static function addDataModelParams($data)
	{
		$params = self::selectParams(['note', 'id_prod']);
		$params = array_merge($params, $data);
		$params['date_add'] = time();
		return $params;
	}
	
}