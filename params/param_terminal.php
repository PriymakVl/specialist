<?php

require_once('param.php');

class ParamTerminal extends Param {
	
	public static function startWork()
	{
		$keys = ['id_order', 'id_prod', 'id_worker'];
		$params = self::getAll($keys);
		$params['state_work'] = Order::STATE_WORK_PROGRESS;
		$params['time_start'] = time();
		return $params;
	}
	
	public static function endWork()
	{
		$keys = ['id_order', 'id_prod'];
		$params = self::getAll($keys);
		$params['state_work'] = Order::STATE_WORK_END;
		$params['time_end'] = time();
		return $params;
	}
	
	public static function stopWork()
	{
		$keys = ['id_order', 'id_prod'];
		$params = self::getAll($keys);
		$params['state_work'] = Order::STATE_WORK_STOPPED;
		return $params;
	}
	
}