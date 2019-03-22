<?php
require_once('order_action_model.php');

class OrderActionStatic extends OrderActionModel {

	public static function add($products, $order)
	{
		foreach ($products as $product) {
			$actions = ProductAction::getAllBySymbol($product->symbol);
			self::addAction($actions, $order, $product);
		}
	}
	
	private static function addAction($actions, $order, $product)
	{
		foreach ($actions as $action) {
			$params = ParamOrderAction::add($action, $order, $product);
			self::addOne($params);
		}
	}
	
	public static function getForTerminal($params)
	{
		if ($params['action'] == 'all' && $params['order'] == 'all') $ids = self::getAllNotReadyActions($params);
		else if ($params['action'] != 'all' && $params['order'] == 'all' ) $ids = self::getForAllOrders($params);
		else $ids = self::getForOneOrder($params);
		return self::createArrayActions($ids);
	}
	
	public static function createArrayActions($ids)
	{
		 $actions = Helper::createArrayOfObject($ids, 'OrderAction');
		 foreach ($actions as $action) {
			$action->getProduct()->getOrder()->setBgTerminalBox()->convertState();
		 }
		 return $actions;
	}
	
	public static function setTimeManufacturing($action, $product)
	{
		if (!$action->time_prod) return '';
		return ($action->time_prod * $product->orderQtyAll) + $action->time_prepar;
	}
	
	public static function getOrdersForTerminal()
	{
		$orders = [];
		$items = self::getOrdersWhereStateActionsNotEnded();
		if (empty($items)) return $orders;
		foreach ($items as $item) {
			$orders[] = new Order($item->id_order);
		}
		return $orders;
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
	
	
	
	
}























