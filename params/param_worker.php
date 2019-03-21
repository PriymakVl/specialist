<?php

//require_once('param.php');

class ParamWorker extends Param {
    
	public static function made($id_worker = false)
	{
		$keys = ['id_worker', 'period_start', 'period_end'];
		$params = self::getAll($keys);
		$params['id_worker'] = $id_worker ? $id_worker : $params['id_worker'];
		$params['status'] = Model::STATUS_ACTIVE;
		$params['state'] = OrderActionState::ENDED;
		$params['period_start'] = empty($params['period_start']) ? mktime(0,0,0) : Date::convertStringToTime($params['period_start']);
		$params['period_end'] = empty($params['period_end']) ? time() : Date::convertStringToTime($params['period_end']);
		return $params;
	}
	
	public static function plan($login)
	{
		$params['state'] = OrderActionState::ENDED;
		$default_actions_arr = Worker::setDefaultActions($login);
		$params['default_actions'] = trim(implode(',', $default_actions_arr), ',');
		$params['status'] = Model::STATUS_ACTIVE;
		return $params;
	}
	
}