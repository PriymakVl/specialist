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
			$params = self::setParamsAdd($action, $order, $product);
			self::addOne($params);
		}
	}
	
	private static function setParamsAdd($action, $order, $product)
	{
		$params['id_order'] = $order->id;
		$params['type_order'] = $order->type;
		$params['id_prod'] = $product->id;
		$params['id_action'] = $action->id_action;//id form table actions
		$params['state'] = self::STATE_WORK_PLANED;
		$params['qty'] = $product->orderQtyAll;
		return $params;
	}
	
	private static function addOne($params)
	{
        $sql = "INSERT INTO `order_product_actions` (id_order, id_prod, qty, id_action, state, type_order) 
		VALUES (:id_order, :id_prod, :qty, :id_action, :state, :type_order)";
        return self::perform($sql, $params);
	}
	
	public static function getForTerminal($params)
	{
		if (empty($params['id_action'])) $ids = self::getAllActions($params);
		else $ids = self::get($params);
		return self::createArrayActions($ids);
	}
	
	public static function get($params)
	{
		$sql = 'SELECT `id` FROM `order_product_actions` 
		WHERE `id_action` = :id_action AND `state` != :state AND `type_order` = :type_order AND `status` = :status';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public static function getAllActions($params)
	{
		$sql = 'SELECT `id` FROM `order_product_actions` WHERE `state` != :state AND `type_order` = :type_order AND `status` = :status';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public static function createArrayActions($ids)
	{
		 $actions = Helper::createArrayOfObject($ids, 'OrderProductAction');
		 foreach ($actions as $prod_action) {
			$prod_action->getProduct()->getOrder()->getAction()->setBgTerminalBox()->convertState();
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
		$sql = 'UPDATE `order_product_actions` SET `state` = :state, `time_start` = :time_start, `id_worker` = :id_worker 
		WHERE `id_order` = :id_order AND `id_prod` = :id_prod AND `id_action` = :id_action';
		return self::perform($sql, $params);
	}
	
	public static function endWork($params)
	{
		$sql = 'UPDATE `order_product_actions` SET `state` = :state, `time_end` = :time_end 
		WHERE `id_order` = :id_order AND `id_prod` = :id_prod AND `id_action` = :id_action';
		return self::perform($sql, $params);
	}
	
	public static function checkMadeProduct($params)
	{
		$actions = self::getAllForProduct($params);
		if (empty($actions)) exit('error checkMadeProduct');
		foreach ($actions as $action) {
			if ($action->state != self::STATE_WORK_END) return false;
		}
		return true;
	}
	
	public static function getAllForProduct($params)
	{
		$sql = 'SELECT * FROM `order_product_actions` WHERE `id_prod` = :id_prod AND `id_order` = :id_order AND `status` = :status';
		return self::perform($sql, $params)->fetchAll();
	}
	
	
	
	
}























