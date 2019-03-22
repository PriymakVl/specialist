<?php

// require_once('param.php');

class ParamTerminal extends Param {
	
	public static function editState()
	{
		$keys = ['id_action', 'state', 'action'];
		$params = self::getAll($keys);
		$params['id_worker'] = Session::get('id_user');
		$params['time'] = time();
		$params['type_action'] = 'plan';
		return $params;
	}
	
	public static function editStateUnplan()
	{
		$keys = ['id_action', 'state'];
		$params = self::getAll($keys);
		$params['id_worker'] = Session::get('id_user');
		$params['time'] = time();
		$params['type_action'] = 'unplan';
		return $params;
	}
	
	public static function getActions($worker)
	{
		$keys = ['action', 'type_order', 'order'];
		$params = self::getAll($keys);
		$params['action'] = empty($params['action']) ? $worker->defaultProductAction : $params['action'];
		$params['type_order'] = empty($params['type_order']) ? $worker->defaultTypeOrder : $params['type_order'];
		if (empty($params['order'])) $params['order'] = 'all';
		$params['state'] = OrderActionState::ENDED;
		$params['status'] = Model::STATUS_ACTIVE;
		return $params;
	}
	
	public static function addNote()
	{
		$keys = ['id', 'note', 'action'];
		$params = self::getAll($keys);
		return $params;
	}
	
}