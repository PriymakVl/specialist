<?php

require_once('param.php');

class ParamOrderActionUnplan extends Param {

    public static function add()
	{
		$keys = ['save', 'prod_symbol', 'prod_name', 'action_name', 'time_manufac', 'qty', 'note', 'id_order'];
		$params = self::getAll($keys);
		$params['state'] = OrderActionState::PLANED;
		$params['qty'] = empty($params['qty']) ? 1 : $params['qty'];
		return $params;
	}
	
	public static function edit()
	{
		$keys = ['save', 'prod_symbol', 'prod_name', 'action_name', 'time', 'qty', 'note', 'id', 'state', 'id_order', 'time_manufac'];
		$params = self::getAll($keys);
		$params['qty'] = empty($params['qty']) ? 1 : $params['qty'];
		$params['action'] = 'unplan';
		$params['id_worker'] = Session::get('id_user');
		$params['time'] = time();
		return $params;
	}
	
}