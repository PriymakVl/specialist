<?php

require_once('param.php');

class ParamOrderActionUnplan extends Param {

    public static function add()
	{
		$keys = ['save', 'id_order', 'id_prod', 'id_action', 'prod_symbol', 'prod_name', 'action_name', 'time_manufac', 'qty', 'note'];
		$params = self::getAll($keys);
		$params['state'] = OrderAction::STATE_WORK_PLANED;
		$params['qty'] = empty($params['qty']) ? 0 : $params['qty'];
		return $params;
	}
	
}