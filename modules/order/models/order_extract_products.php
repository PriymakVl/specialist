<?php

require_once ('order_base.php');

class OrderExtractProducts extends OrderBase
{
	
	public static function get($content)
	{
		$products_specif = self::getProductFromSpecification($content);
		$products_all = array_merge($content, $products_specif);
		return self::groupProducts($products_all);
	}
	
	private static function getProductFromSpecification($content)
	{
		$products = [];
		foreach ($content as $product) {
			if (!$product->idSpecifActive) continue;
			$items = SpecificationContent::getAllByIdSpecification($product->idSpecifActive);
			$items = self::countOrderQuantity($items, $product->orderQtyAll);
			$products = array_merge($products, $items);
			
		}
		return $products;
	}
	
	//считает количество деталей спецификации если заказано несколько изделий
	private static function countOrderQuantity($products, $order_qty)
	{
		foreach ($products as $product) {
			$product->orderQtyAll = $product->specifQty * $order_qty;
		}
		return $products;
	}
	
	private static function groupProducts($products)
	{
		$products_group = [];
		$ids = Helper::getArrayPropertyFromArrayObjects($products, 'id');
		$ids_same = Helper::getSameValuesArray($ids);
		if (empty($ids_same)) return $products;
		return self::groupSameProducts($products, $ids_same);
	}
	
	private static function groupSameProducts($products, $ids_same)
	{
		foreach ($ids_same as $id) {
			$same_products = Helper::getObjectsWithSameId($products, $id);
			$total_qty = self::getTotalQuantity($same_products);
			$total_product = $same_products[0];
			$total_product->orderQtyAll = $total_qty;
			$products = Helper::deleteObjectsFromArrayById($products, $id);
			$products[] = $total_product; 
		}
		return $products;
	}
	
	private static function getTotalQuantity($products)
	{
		$total_qty = 0;
		foreach ($products as $product) {
			$total_qty = $total_qty + $product->orderQtyAll;
		}
		return $total_qty;
	}
	

	
	

}