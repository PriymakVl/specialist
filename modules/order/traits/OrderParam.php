<?php

trait OrderParam {

	use Param;
	
	public function addDataParam($keys)
	{
		$params = self::selectParams($keys);
		$params['date_exec'] = Date::convertStringToTime($params['date_exec']);
		$params['date_reg'] = time();
		$params['state'] = OrderState::REGISTERED;
		return $params;
	}
	
	public function editDataParam() 
	{
		$params = self::selectParams(['type', 'note', 'rating', 'id_order']);
		$params['date_exec'] = Date::convertStringToTime($this->post->date_exec);
		$params['symbol'] = trim($this->post->symbol);
		return $params;
	}
	
}