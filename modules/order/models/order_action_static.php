<?php
require_once('order_base.php');

class OrderActionStatic extends OrderBase {

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
	
	public static function setTimeManufacturing($action, $product)
	{
		if (!$action->time_prod) return '';
		return ($action->time_prod * $product->orderQtyAll) + $action->time_prepar;
	}
	
	private static function addOne($params)
	{
        $sql = "INSERT INTO `order_actions` (id_order, id_prod, qty, id_action, state, type_order, time_manufac) 
		VALUES (:id_order, :id_prod, :qty, :id_action, :state, :type_order, :time_manufac)";
        return self::perform($sql, $params);
	}
	
	public static function getForTerminal($params)
	{
		if ($params['id_action'] == 'all') $ids = self::getAllNotReadyActions($params);
		else $ids = self::get($params);
		return self::createArrayActions($ids);
	}
	
	public static function get($params)
	{
		$sql = 'SELECT `id` FROM `order_actions` 
		WHERE `id_action` = :id_action AND `state` != :state AND `type_order` = :type_order AND `status` = :status';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public static function getByIdOrderAndIdProductAndIdAction($params)
	{
		$sql = 'SELECT * FROM `order_actions` WHERE `id_action` = :id_action AND `id_order` = :id_order AND `id_prod` = :id_prod';
		return self::perform($sql, $params)->fetch();
	}
	
	public static function getAllNotReadyActions($params)
	{
		unset($params['id_action']);
		$sql = 'SELECT `id` FROM `order_actions` WHERE `state` != :state AND `type_order` = :type_order AND `status` = :status';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public static function createArrayActions($ids)
	{
		 $actions = Helper::createArrayOfObject($ids, 'OrderAction');
		 foreach ($actions as $action) {
			$action->getProduct()->getOrder()->getAction()->setBgTerminalBox()->convertState();
		 }
		 return $actions;
	}
	
	protected static function convertStateWork($state)
	{
		switch ($state) {
			case self::STATE_WORK_WAITING : return "Ожидает окончания другой операции";
			case self::STATE_WORK_PLANED : return "Запланирована";
			case self::STATE_WORK_PROGRESS : return "В работе";
			case self::STATE_WORK_STOPPED : return "Остановлена";
			case self::STATE_WORK_END : return "Выполнена";
			default: return "Не известное состояние";
		}
	}
	
	public static function startWork($params)
	{
		$sql = 'UPDATE `order_actions` SET `state` = :state, `time_start` = :time_start, `id_worker` = :id_worker 
		WHERE `id_order` = :id_order AND `id_prod` = :id_prod AND `id_action` = :id_action';
		return self::perform($sql, $params);
	}
	
	public static function endWork($params)
	{
		$sql = 'UPDATE `order_actions` SET `state` = :state, `time_end` = :time_end 
		WHERE `id_order` = :id_order AND `id_prod` = :id_prod AND `id_action` = :id_action';
		return self::perform($sql, $params);
	}
	
	public static function stopWork($params)
	{
		$sql = 'UPDATE `order_actions` SET `state` = :state WHERE `id_order` = :id_order AND `id_prod` = :id_prod AND `id_action` = :id_action';
		return self::perform($sql, $params);
	}
	
	public static function getNotReadyActionOrder($params)
	{
		$sql = 'SELECT * FROM `order_actions` WHERE `state` != :state AND `id_order` = :id_order AND `status` = :status';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public static function planWorker($params)
	{
		$sql = 'SELECT * FROM `order_actions` WHERE `id_action` IN ('.$params['id_actions'].') AND `state` != :state AND `status` = :status';
		unset($params['id_actions']);
		return self::perform($sql, $params)->fetchAll();
	}
	
	public static function madeWorker($params)
	{
		$slq = 'SELECT * FROM `order_actions` 
		WHERE `id_worker` = :id_worker AND `state` = :state AND `time_end` BETWEEN :start_period AND :end_period AND `status` = :status';
		return self::perform($slq, $params)->fetchAll();
	}
	
	
	
	
}























