<?php

require_once('./core/param.php');

class OrderParam extends Param {

	static function addData ($keys)
	{
		$params = self::select($keys);
		$params['date_exec'] = Date::convertStringToTime($params['date_exec']);
		$params['date_reg'] = time();
		$params['state'] = OrderState::REGISTERED;
		return $params;
	}
	
}