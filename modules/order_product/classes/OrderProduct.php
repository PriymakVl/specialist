<?php

class OrderProduct {
	
	use OrderProductStatic;

	public static function add($params)
	{
        $sql = "INSERT INTO `order_content` (id_order, id_prod, quantity) VALUES (:id_order, :id_prod, :quantity)";
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
            $product = new Product($item->id_prod);
            $product->orderQtyAll = $item->quantity;
			$product->getSpecification()->countTimeManufacturing();
			$product->id_item = $item->id;
            $content[] = $product;
        }
        return $content;
    }
	
	public static function changeQuantity($params)
	{
		$sql = 'UPDATE `order_content` SET `quantity` = :qty WHERE `id` = :id_item';
		return self::update($sql, $params);
	}
	
	public static function deleteAll($id_order, $ids) 
	{
		foreach ($ids as $id) {
			self::deleteOne($id_order, $id);
		}
	}
	
	public static function deleteOne($id_order, $id_prod)
	{
		$sql = 'UPDATE `order_content` SET `status` = :status WHERE `id_prod` = :id_prod AND `id_order` = :id_order';
		$params = ['id_order' => $id_order, 'id_prod' => $id_prod, 'status' => self::STATUS_DELETE];
		return self::perform($sql, $params);
	}
	
	public static function addByPositionsOrder($positions)
	{
		foreach ($positions as $position) {
			if (!$position->symbol) continue;
			$symbol = explode('x', $position->symbol)[0];//get symbol product without length cylinder
			$items = Product::getAllBySymbol($symbol);
			if (empty($items)) continue;
			self::add($position->id_order, $items[0]->id, $position->qty);
		}
	}
	
	
	
	
	
	

	
	

	
	
}























