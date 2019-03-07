<?php

require_once('param.php');

class ParamTerminal extends Param {
	
	public static function startWork()
	{
		$keys = ['id', 'action'];
		$params = self::getAll($keys);
		$params['state'] = OrderActionState::PROGRESS;
		$params['id_worker'] = Session::get('id_user');
		$params['time'] = time();
		return $params;
	}
	
	public static function endWork()
	{
		$keys = ['id', 'action'];
		$params = self::getAll($keys);
		$params['state'] = OrderActionState::ENDED;
		$params['time'] = time();
		$params['id_worker'] = Session::get('id_user');
		return $params;
	}
	
	public static function stopWork()
	{
		$keys = ['id', 'state', 'action'];
		$params = self::getAll($keys);
		if ($params['state'] == OrderActionState::STOPPED) $params['state'] = OrderActionState::PROGRESS;
		else $params['state'] = OrderActionState::STOPPED;
		$params['time'] = time();
		$params['id_worker'] = Session::get('id_user');
		return $params;
	}
	
	public static function getActions($worker)
	{
		$action = self::get('action');
		$type_order = self::get('type_order');
		$params['action'] = $action ? $action : $worker->defaultProductAction;
		$params['type_order'] = $type_order ? $type_order : $worker->defaultTypeOrder;
		$params['state'] = OrderActionState::ENDED;
		$params['status'] = Model::STATUS_ACTIVE;
		return $params;
	}
	
}