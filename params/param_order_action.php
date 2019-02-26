<?php

require_once('param.php');
require_once('./helpers/date.php');

class ParamOrderAction {
	 

    public static function add($action, $order, $product)
	{
		$params['id_order'] = $order->id;
		$params['type_order'] = $order->type;
		$params['id_prod'] = $product->id;
		$params['id_action'] = $action->id_action;//id form table actions
		$params['state'] = self::STATE_WORK_PLANED;
		$params['qty'] = $product->orderQtyAll;
		$params['time_manufac'] = self::setTimeManufacturing($action, $product);
		return $params;
	}
	
	public static function madeWorker($id_worker = null)
	{
		$keys = ['start_period', 'end_period', 'id_worker'];
		$params = Param::getAll($keys);
		if (empty($params['start_period'])) $params['start_period'] = mktime(0,0,0);
		if (empty($params['end_period'])) $params['end_period'] = $params['start_period'] + Date::DAY_SECOND;
		$params['id_worker'] = $id_worker ? $id_worker : $params['id_worker'];
		$params['state'] = Order::STATE_WORK_END;
		$params['status'] = Order::STATUS_ACTIVE;
		return $params;
	}
	
}