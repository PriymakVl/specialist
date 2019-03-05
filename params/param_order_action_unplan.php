<?php

require_once('param.php');

class ParamOrderActionUnplan extends Param {

    public static function add()
	{
		$keys = ['save', 'id_action', 'prod_symbol', 'prod_name', 'action_name', 'time_manufac', 'qty', 'note'];
		$params = self::getAll($keys);
		$params['id_prod'] = empty($params['id_prod']) ? 0 : $params['id_prod'];
		$params['state'] = OrderAction::STATE_WORK_PLANED;
		$params['qty'] = empty($params['qty']) ? 0 : $params['qty'];
		return $params;
	}
	
}