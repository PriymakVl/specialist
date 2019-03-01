<?php

require_once('param.php');

class ParamOrderAction {
	 

    public static function add($action, $order, $product)
	{
		$params['id_order'] = $order->id;
		$params['type_order'] = $order->type;
		$params['id_prod'] = $product->id;
		$params['id_action'] = $action->id_action;//id form table actions
		$params['state'] = Order::STATE_WORK_PLANED;
		$params['qty'] = $product->orderQtyAll;
		$params['time_manufac'] = OrderAction::setTimeManufacturing($action, $product);
		return $params;
	}
	
	public static function edit()
	{
		$keys = ['id_action', 'state', 'save'];
		$params = Param::getAll($keys);
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
	
	public static function getNotReadyActionOrder()
	{
		$params['id_order'] = Param::get('id_order');
		$params['status'] = OrderAction::STATUS_ACTIVE;
		$params['state'] = OrderAction::STATE_WORK_END;
		return $params;
	}
	
	public static function convertStateWork($state)
	{
		switch ($state) {
			case OrderAction::STATE_WORK_WAITING : return "Ожидает окончания другой операции";
			case OrderAction::STATE_WORK_PLANED : return "Запланирована";
			case OrderAction::STATE_WORK_PROGRESS : return "В работе";
			case OrderAction::STATE_WORK_STOPPED : return "Остановлена";
			case OrderAction::STATE_WORK_END : return "Выполнена";
			default: return "Не известное состояние";
		}
	}
	
	public static function getBgStateWork($state)
	{
		switch ($state) {
			case OrderAction::STATE_WORK_WAITING : return "orange";
			case OrderAction::STATE_WORK_PLANED : return "#fff";
			case OrderAction::STATE_WORK_PROGRESS : return "yellow";
			case OrderAction::STATE_WORK_STOPPED : return "red";
			case OrderAction::STATE_WORK_END : return "green";
			default: return "#fff";
		}
	}
	
}