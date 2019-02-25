<?php

require_once('param.php');

class ParamWorker extends Param {
    
	public static function forMadeWorkerToday($id_worker)
	{
		$params['id_worker'] = $id_worker;
		$params['status'] = Worker::STATUS_ACTIVE;
		$params['state_work'] = Order::STATE_WORK_END;
		$params['start_time_end'] = mktime(0,0,0);//start day
		$params['end_time_end'] = time();
		return $params;
	}
	
	public static function forMadeWorkers($login)
	{
		$id_default_actions_arr = Worker::setDefaultActions($login);
		$params['id_actions'] = trim(implode(',', $id_default_actions_arr), ',');
		$params['state'] = OrderAction::STATE_WORK_END;
		$params['status'] = Worker::STATUS_ACTIVE;
		return $params;
	}
	
}