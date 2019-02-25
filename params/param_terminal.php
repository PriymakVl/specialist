<?php

require_once('param.php');

class ParamTerminal extends Param {
	
	public static function startWork()
	{
		$keys = ['id_order', 'id_prod', 'id_worker', 'id_action'];
		$params = self::getAll($keys);
		$params['state'] = Order::STATE_WORK_PROGRESS;
		$params['time_start'] = time();
		return $params;
	}
	
	public static function endWork()
	{
		$keys = ['id_order', 'id_prod', 'id_action'];
		$params = self::getAll($keys);
		$params['state'] = Order::STATE_WORK_END;
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
	
	public static function getActions($worker)
	{
		$params['type_order'] = $worker->defaultTypeOrder;
		$params = self::setIdAction($params, $worker);
		$params['state'] = OrderProductAction::STATE_WORK_END;
		$params['status'] = Model::STATUS_ACTIVE;
		return $params;
	}
	
	private static function setIdAction($params, $worker)
	{
		if (self::get('all_actions')) return $params;
		$id_action = self::get('id_action');
		$params['id_action'] = $id_action ? $id_action : $worker->defaultProductAction;
		return $params;
	}
	
	public static function checkMadeProduct()
	{
		$keys = ['id_prod', 'id_order'];
		$params = self::getAll($keys);
		$params['status'] = OrderProductAction::STATUS_ACTIVE;
		return $params;
	}
	
}