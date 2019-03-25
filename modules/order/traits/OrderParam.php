<?php

trait OrderParam {

	use Param;
	
	static function addDataParam ($keys)
	{
		$params = self::selectParams($keys);
		$params['date_exec'] = Date::convertStringToTime($params['date_exec']);
		$params['date_reg'] = time();
		$params['state'] = OrderState::REGISTERED;
		return $params;
	}
	
}