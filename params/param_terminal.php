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
		$keys = ['id_order', 'id_prod', 'id_action'];
		$params = self::getAll($keys);
		$action = OrderAction::getByIdOrderAndIdProductAndIdAction($params);
		if ($action->state == OrderAction::STATE_WORK_STOPPED) $params['state'] = OrderAction::STATE_WORK_PROGRESS;
		else $params['state'] = OrderAction::STATE_WORK_STOPPED;
		return $params;
	}
	
	public static function getActions($worker)
	{
		$id_action = self::get('id_action');
		$params['id_action'] = $id_action ? $id_action : $worker->defaultProductAction;
		$params['type_order'] = $worker->defaultTypeOrder;
		$params['state'] = OrderAction::STATE_WORK_END;
		$params['status'] = Model::STATUS_ACTIVE;
		return $params;
	}
	
}