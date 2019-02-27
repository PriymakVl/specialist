<?php

require_once('param.php');

class ParamWorker extends Param {
    
	public static function made($id_worker = false)
	{
		$keys = ['id_worker', 'start_period', 'end_period'];
		$params = getAll($keys);
		$params['id_worker'] = $id_worker ? $id_worker : $params['id_worker'];
		$params['status'] = Worker::STATUS_ACTIVE;
		$params['state_work'] = Order::STATE_WORK_END;
		$params['start_period'] = empty($params['start_period']) ? mktime(0,0,0) : $params['start_period'];
		$params['end_period'] = empty($params['end_period']) ? time() : $params['end_period'];
		return $params;
	}
	
	public static function plan($login)
	{
		$keys = ['state', 'start_period', 'end_period'];
		$params = self::getAll();
		$params['state'] = empty($params['state']) ? OrderAction::STATE_WORK_END : OrderAction::STATE_WORK_PLANED;
		$id_default_actions_arr = Worker::setDefaultActions($login);
		$params['id_actions'] = trim(implode(',', $id_default_actions_arr), ',');
		$params['status'] = Worker::STATUS_ACTIVE;
		return $params;
	}
	
}