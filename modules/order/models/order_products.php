<?php
require_once('order_base.php');

class OrderProducts extends OrderBase {

	public static function add($products)
	{
		foreach ($products as $product) {
			self::addByOne($product);
		}
	}
	
	public static function addByOne($product)
	{
		$params = ['id_order' => $id_order, 'id_item' => $id_item, 'type' => $type, 'quantity' => $qty];
		$fields = ':id_order, :id_product, qty_all, type_order, kind_work';
        $sql = "INSERT INTO `order_products` (id_order, id_item, `type`, quantity) VALUES (:id_order, :id_item, :type, :quantity)";
        return self::perform($sql, $params);
	}
	
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
			self::setProduct($item);
            $products[] = $product;
        }
        return $content;
    }
	
	private static function setProduct($item)
	{
		$product = new Product($item->id_product);
		$product->orderQtyAll = $item->qty_all;
		$product->orderQtyDone = $item->qty_done;
		$product->startWork = $item->time_start;
		$product->endWork = $item->time_end;
		$product->idWoker = $item->id_woker;
		$product->typeOrder = $item->type_order;
		$product->kindWork = $item->kind_work;
	}
	
	
	
	

	
	

	
	
}























