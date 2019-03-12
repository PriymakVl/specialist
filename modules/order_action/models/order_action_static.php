<?php
require_once('order_action_base.php');

class OrderActionStatic extends OrderActionBase {

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
        $sql = "INSERT INTO `order_actions` (id_order, id_prod, qty, id_data, state, type_order, time_manufac, rating) 
		VALUES (:id_order, :id_prod, :qty, :id_data, :state, :type_order, :time_manufac, :rating)";
        return self::perform($sql, $params);
	}
	
	public static function getForTerminal($params)
	{
		if ($params['action'] == 'all') $ids = self::getAllNotReadyActions($params);
		else $ids = self::get($params);
		return self::createArrayActions($ids);
	}
	
	public static function get($params)
	{
		$sql = 'SELECT `id` FROM `order_actions` 
		WHERE `id_data` = :action AND `state` != :state AND `type_order` = :type_order AND `status` = :status ORDER BY `rating` DESC';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public static function getByIdOrderAndIdProductAndIdAction($params)
	{
		$sql = 'SELECT * FROM `order_actions` WHERE `id_data` = :id_data AND `id_order` = :id_order AND `id_prod` = :id_prod';
		return self::perform($sql, $params)->fetch();
	}
	
	public static function getAllNotReadyActions($params)
	{
		unset($params['action']);
		$sql = 'SELECT `id` FROM `order_actions` WHERE `state` != :state AND `type_order` = :type_order AND `status` = :status ORDER BY `rating` DESC';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public static function createArrayActions($ids)
	{
		 $actions = Helper::createArrayOfObject($ids, 'OrderAction');
		 foreach ($actions as $action) {
			$action->getProduct()->getOrder()->setBgTerminalBox()->convertState();
		 }
		 return $actions;
	}
	
	public static function setStateStartWork($params)
	{
		unset($params['action']);
		$sql = 'UPDATE `order_actions` SET `state` = :state, `time_start` = :time, `id_worker` = :id_worker WHERE `id` = :id';
		return self::perform($sql, $params);
	}
	
	public static function setStateEndWork($params)
	{
		unset($params['action'], $params['id_worker']);
		$sql = 'UPDATE `order_actions` SET `state` = :state, `time_end` = :time WHERE `id` = :id';
		return self::perform($sql, $params);
	}
	
	public static function setStateStopWork($params)
	{
		unset($params['action'], $params['id_worker'], $params['time']);
		$sql = 'UPDATE `order_actions` SET `state` = :state WHERE `id` = :id';
		return self::perform($sql, $params);
	}
	//когда изменяется не из терминала
	public static function updateState($params)
	{
		unset($params['save'], $params['id_worker'], $params['time']);
		$sql = 'UPDATE `order_actions` SET `state` = :state WHERE `id` = :id';
		return self::perform($sql, $params);
	}
	
	public static function getNotReadyActionOrder($params)
	{
		$sql = 'SELECT * FROM `order_actions` WHERE `state` != :state AND `id_order` = :id_order AND `status` = :status';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public static function planWorker($params)
	{
		$sql = 'SELECT * FROM `order_actions` WHERE `id_data` IN ('.$params['default_actions'].') AND `state` != :state AND `status` = :status';
		unset($params['default_actions']);
		return self::perform($sql, $params)->fetchAll();
	}
	
	public static function madeWorker($params)
	{
		$slq = 'SELECT * FROM `order_actions` 
		WHERE `id_worker` = :id_worker AND `state` = :state AND `time_end` BETWEEN :period_start AND :period_end AND `status` = :status';
		return self::perform($slq, $params)->fetchAll();
	}
	
	public static function getIdActionsByIdOrder($id_order)
	{
		$slq = 'SELECT * FROM `order_actions` WHERE `id_order` = :id_order AND `status` = :status';
		$params = ['id_order' => $id_order, 'status' => self::STATUS_ACTIVE];
		return self::perform($slq, $params)->fetchAll();
	}
	
	
	public static function setStateEndedForAllActionsOrder($id_order)
	{
		$sql = 'UPDATE `order_actions` SET `state` = :state WHERE `id_order` = :id_order';
		$params = ['id_order' => $id_order, 'state' => OrderActionState::ENDED];
		return self::perform($sql, $params);
	}
	
	public static function getProductsOrder($id_order)
	{
		$slq = 'SELECT `id_prod` FROM `order_actions` WHERE `id_order` = :id_order AND `status` = :status GROUP BY `id_prod`';
		$params = ['id_order' => $id_order, 'status' => self::STATUS_ACTIVE];
		return self::perform($slq, $params)->fetchAll();
	}
	
	public static function addNote($params)
	{
		unset($params['action']);
		$sql = 'UPDATE `order_actions` SET `note` = :note WHERE `id` = :id';
		return self::perform($sql, $params);
	}
	
	public static function updateRating($id_order, $rating)
	{
		$sql = 'UPDATE `order_actions` SET `rating` = :rating WHERE `id_order` = :id_order';
		$params = ['rating' => $rating, 'id_order' => $id_order];
		return self::perform($sql, $params);
	}
	
	
	
	
}























