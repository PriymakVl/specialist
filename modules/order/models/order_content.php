<?php
require_once('order_base.php');

class OrderContent extends OrderBase {

    const TYPE_SPECIFIC = 1;
    const TYPE_PRODUCT = 2;

	public static function add($id_order, $id_item, $type, $qty = 1)
	{
		$params = ['id_order' => $id_order, 'id_item' => $id_item, 'type' => $type, 'quantity' => $qty];
        $sql = "INSERT INTO `order_content` (id_order, id_item, `type`, quantity) VALUES (:id_order, :id_item, :type, :quantity)";
        return self::perform($sql, $params);
	}
	
	public static function get($id_order)
	{
		$sql = 'SELECT * FROM `order_content` WHERE `id_order` = :id_order AND `status` = :status';
        $params = ['id_order' => $id_order, 'status' => self::STATUS_ACTIVE];
        $items = self::perform($sql, $params)->fetchAll();
        return self::createArrayContent($items);
	}
	
	private static function createArrayContent($items)
    {
        $content = [];
        if (empty($items)) return $content;
        foreach ($items as $item) {
            if ($item->type == self::TYPE_SPECIFIC) $product = SpecificationStatic::getParentProduct($item->id_item);
            else $product = new Product($item->id_item);
            $product->orderQty = $item->quantity;
            $content[] = $product;
        }
        return $content;
    }
	
	
	
	

	
	

	
	
}























