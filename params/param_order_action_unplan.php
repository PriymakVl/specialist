<?php

require_once('param.php');

class ParamOrderActionUnplan extends Param {

    public static function add()
	{
		$keys = ['save', 'prod_symbol', 'prod_name', 'action_name', 'time_manufac', 'qty', 'note', 'id_order'];
		$params = self::getAll($keys);
		$params['state'] = OrderActionState::PLANED;
		$params['qty'] = empty($params['qty']) ? 0 : $params['qty'];
		return $params;
	}
	
}