<?php
require_once('order_base.php');

class OrderProducts extends OrderBase {

	public static function add($products, $order)
	{
		foreach ($products as $product) {
			self::addOne($product, $order);
		}
	}
	
	public static function addOne($product, $order)
	{
		$params = self::getParams($product, $order);
        $sql = "INSERT INTO `order_products` (id_order, id_prod, qty_all, type_order, kind_work, state_work) 
				VALUES (:id_order, :id_prod, :qty_all, :type_order, :kind_work, :state_work)";
        return self::perform($sql, $params);
	}
	
	private static function getParams($product, $order)
	{
		$params['id_order'] = $order->id;
		$params['id_prod'] = $product->id;
		$params['qty_all'] = $product->orderQtyAll;
		$params['type_order'] = $order->type;;
		$params['kind_work'] = self::getKindOFWork($product->specification);
		$params['state_work'] = self::STATE_WORK_PLANED;
		return $params;
	}
	
	private static function getKindOFWork($specification) 
	{
		if ($specification) return self::KIND_WORK_ASSEMBLY;
		else return self::KIND_WORK_MAKE;
	}
	
	public static function startWork($params)
	{
		$sql = 'UPDATE `order_products` SET `state_work` = :state_work, `time_start` = :time_start, `id_worker` = :id_worker 
		WHERE `id_order` = :id_order AND `id_prod` = :id_prod';
		return self::perform($sql, $params);
	}
	
	public static function endWork($params)
	{
		$sql = 'UPDATE `order_products` SET `state_work` = :state_work, `time_end` = :time_end WHERE `id_order` = :id_order AND `id_prod` = :id_prod';
		return self::perform($sql, $params);
	}
	
	public static function stopWork($params)
	{
		$sql = 'UPDATE `order_products` SET `state_work` = :state_work WHERE `id_order` = :id_order AND `id_prod` = :id_prod';
		return self::perform($sql, $params);
	}

	
	/** section get products from database */
	
	public static function getAllOnOrder($id_order)
	{
		$sql = 'SELECT * FROM `order_products` WHERE `id_order` = :id_order AND `status` = :status';
        $params = ['id_order' => $id_order, 'status' => self::STATUS_ACTIVE];
        $items = self::perform($sql, $params)->fetchAll();
		if ($items) return self::createArrayProducts($items);
        return false;
	}
	
	public static function getForWorker($worker, $order = false) 
	{
		$sql = self::getSqlForWorker($order);
        $params = self::getParamsForWorker($worker, $order);
		$items = self::perform($sql, $params)->fetchAll();
		if ($items) return self::createArrayProducts($items);
        return false;
	}
	
	private static function getSqlForWorker($order)
	{
		$sql = 'SELECT * FROM `order_products` ';
		if ($order) $where = 'WHERE `id_oder` = :id_order AND ';
		else $where = 'WHERE ';
		return $sql.$where.'`status` = :status AND `type_order` = :type_order AND `kind_work` = :kind_work AND `state_work` < 4';
	}

	
	private static function getParamsForWorker($worker, $order)
	{
		if ($order) $params['id_order'] = $order->id; 
		$params['status'] = self::STATUS_ACTIVE;
		$params['type_order'] = $worker->defaultTypeOrder;
		$params['kind_work'] = $worker->defaultKindWork;
		return $params;
	}
	
	private static function createArrayProducts($items)
    {
        $products = [];
        if (empty($items)) return $products;
        foreach ($items as $item) {
			$product = new Product($item->id_prod);
			$product = self::setDatabaseProperties($product, $item);
			$product->setBgTerminalProductBox();
            $products[] = $product;
        }
        return $products;
    }
	
	//при получении из базы данных
	private static function setDatabaseProperties($product, $item)
	{
		$product->orderQtyAll = $item->qty_all;
		$product->orderQtyDone = $item->qty_done;
		$product->startWork = $item->time_start;
		$product->endWork = $item->time_end;
		$product->idWorker = $item->id_worker;
		$product->typeOrder = $item->type_order;
		$product->kindWork = $item->kind_work;
		$product->stateWork = $item->state_work;
		$product->stateWorkConvert = self::convertStateWork($item->state_work);
		$product->timeManufacturingOrder = $item->time_plan;
		return $product;
	}
	
	private static function convertStateWork($state)
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
	
	// private static function getIimeManufacturingForAll($product)
	// {
		// $product->getIimeManufacturing();
		// return ($product->timeProduction * $product->orderQtyAll) + $product->timePreparation;
	// }
	
	
	
	
	
	
	

	
	

	
	
}























