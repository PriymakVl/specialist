<?php
require_once('order_content_model.php');

class OrderContentStatic extends OrderContentModel {
	
	private static $products;

	public static function getAllForOrder($id_order)
	{
        $items = self::getAllForOrderModel();
		if ($items) return self::createArrayContent($items);
		return false;
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
	
	public static function getAllProductsParent($specification)
	{
		foreach ($specification as $product) {
			self::$products[] = $product;
			if (empty($product->specification)
		}
	}
	
	
	
	
	
	

	
	

	
	
}























