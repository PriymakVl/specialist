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
		$params['kind_work'] = self::getKindOFWork($product->idSpecifActive);
		$params['state_work'] = self::STATE_WORK_PLANED;
		return $params;
	}
	
	private static function getKindOFWork($specification) 
	{
		if ($specification) return self::KIND_WORK_ASSEMBLY;
		else return self::KIND_WORK_MAKE;
	}

	
	/** section get products from database */
	
	public static function get($id_order)
	{
		$sql = 'SELECT * FROM `order_products` WHERE `id_order` = :id_order AND `status` = :status';
        $params = ['id_order' => $id_order, 'status' => self::STATUS_ACTIVE];
        $items = self::perform($sql, $params)->fetchAll();
        return self::createArrayProducts($items);
	}
	
	private static function createArrayProducts($items)
    {
        $products = [];
        if (empty($items)) return $products;
        foreach ($items as $item) {
			$product = new Product($item->id_prod);
			$product = self::setDatabaseProperties($product, $item);
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
		$product->idWorker = $item->id_user;
		$product->typeOrder = $item->type_order;
		$product->kindWork = $item->kind_work;
		$product->stateWork = $item->state_work;
		$product->stateWorkConvert = self::convertStateWork($item->state_work);
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
	
	
	
	
	
	
	

	
	

	
	
}























