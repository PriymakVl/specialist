<?php

require_once('param.php');

class ParamOrderAction {
	 

    public static function add($action, $order, $product)
	{
		$params['id_order'] = $order->id;
		$params['type_order'] = $order->type;
		$params['id_prod'] = $product->id;
		$params['id_action'] = $action->id_action;//id form table actions
		$params['state'] = OrderActionState::PLANED;
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
		$params['state'] = OrderActionState::ENDED;
		$params['status'] = Order::STATUS_ACTIVE;
		return $params;
	}
	
	public static function getNotReadyActionOrder()
	{
		$params['id_order'] = Param::get('id_order');
		$params['status'] = OrderAction::STATUS_ACTIVE;
		$params['state'] = OrderActionState::ENDED;
		return $params;
	}
	
	public static function convertStateWork($state)
	{
		switch ($state) {
			case OrderActionState::WAITING : return "Ожидает окончания другой операции";
			case OrderActionState::PLANED : return "Запланирована";
			case OrderActionState::PROGRESS : return "В работе";
			case OrderActionState::STOPPED : return "Остановлена";
			case OrderActionState::ENDED : return "Выполнена";
			default: return "Не известное состояние";
		}
	}
	
	public static function getBgStateWork($state)
	{
		switch ($state) {
			case OrderActionState::WAITING : return "orange";
			case OrderActionState::PLANED : return "#fff";
			case OrderActionState::PROGRESS : return "yellow";
			case OrderActionState::STOPPED : return "red";
			case OrderActionState::ENDED : return "green";
			default: return "#000";
		}
	}
	
	public static function state()
	{
		$keys = ['id_action', 'type'];
		$params = Param::getAll($keys);
		$params['status'] = Model::STATUS_ACTIVE;
		return $params;
	}
	
}