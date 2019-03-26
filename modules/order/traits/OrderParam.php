<?php

trait OrderParam {

	use Param;
	
	static function addDataParam($keys)
	{
		$params = self::selectParams($keys);
		$params['date_exec'] = Date::convertStringToTime($params['date_exec']);
		$params['date_reg'] = time();
		$params['state'] = OrderState::REGISTERED;
		return $params;
	}
	
	static function editModelParam() 
	{
		$params = self::selectParams(['type', 'note', 'rating', 'state', 'id_order']);
		$params['date_exec'] = Date::convertStringToTime(self::getParam('date_exec'));
		$params['symbol'] = trim(self::getParam('symbol'));
		return $params;
	}
	
}