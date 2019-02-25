<?php
require_once('order_base.php');

class OrderProductStatic extends OrderBase {

	public static function add($products, $order)
	{
		foreach ($products as $product) {
			self::addOne($product, $order);
		}
	}
	
	public static function addOne($product, $order)
	{
		$params = self::getParamsAddProduct($product, $order);
        $sql = "INSERT INTO `order_products` (id_order, id_prod, qty, type_order, state) 
				VALUES (:id_order, :id_prod, :qty, :type_order, :state)";
        return self::perform($sql, $params);
	}
	
	private static function getParamsAddProduct($product, $order)
	{
		$params['id_order'] = $order->id;
		$params['id_prod'] = $product->id;
		$params['qty'] = $product->orderQtyAll;
		$params['type_order'] = $order->type;;
		$params['state'] = self::STATE_WORK_PLANED;
		return $params;
	}
	
	public static function madeOrder($id_order)
	{
		$sql = 'UPDATE `order_products` SET `state` = :state WHERE `id_order` = :id_order';
		$params = ['id_order' => $id_order, 'state' => self::STATE_WORK_END];
		return self::perform($sql, $params);
	}
	
/* 	public static function stopWork($params)
	{
		$sql = 'UPDATE `order_products` SET `state_work` = :state_work WHERE `id_order` = :id_order AND `id_prod` = :id_prod';
		return self::perform($sql, $params);
	} */

	
	/** section get products from database */
	
	public static function getAllOnOrder($id_order)
	{
		$sql = 'SELECT * FROM `order_products` WHERE `id_order` = :id_order AND `status` = :status';
        $params = ['id_order' => $id_order, 'status' => self::STATUS_ACTIVE];
        $items = self::perform($sql, $params)->fetchAll();
		if ($items) return self::createArrayProducts($items);
        return false;
	}

	public static function getNotReady($id_order)
    {
        $sql = 'SELECT * FROM `order_products` WHERE `id_order` = :id_order AND `status` = :status AND `state` != :state';
        $params = ['id_order' => $id_order, 'status' => self::STATUS_ACTIVE, 'state' => self::STATE_WORK_END];
        return self::perform($sql, $params)->fetchAll();
    }

	
	// private static function getParamsForWorker($worker, $order)
	// {
		// if ($order) $params['id_order'] = $order->id;
		// $params['status'] = self::STATUS_ACTIVE;
		// $params['type_order'] = $worker->defaultTypeOrder;
		// $params['kind_work'] = $worker->defaultKindWork;
		// return $params;
	// }
	
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
        $product->order = new Order($item->id_order);
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

	
	// private static function getIimeManufacturingForAll($product)
	// {
		// $product->getIimeManufacturing();
		// return ($product->timeProduction * $product->orderQtyAll) + $product->timePreparation;
	// }
	
	
	
	
	
	
	

	
	

	
	
}























