<?php

class OrderProductStatic  {
	
	use OrderProductModel;

	public static function getMainParent()
	{
        $items = self::getMainParentModel();
		if ($items) return self::createArrayProducts($items);
	}
	
	private static function createArrayProducts($items)
    {
        $products = [];
        foreach ($items as $item) {
            $product = (new OrderProduct)->setData($item)->getSpecification();
            $products[] = $product;
        }
        return $products;
    }
	
	public static function deleteAll($id_order, $ids) 
	{
		foreach ($ids as $id) {
			self::deleteOne($id_order, $id);
		}
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
	
	public static function getAllProductsOrder()
	{
		$parent = (new Product)->getData($this->params->id_prod)->getSpecification();
		self::$products[] = $parent;
		if ($parent->specification) self::getAllProductsParent($parent->specification);
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























