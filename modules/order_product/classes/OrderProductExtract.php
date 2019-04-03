<?php

class OrderProductExtract {
	
	// public static function get($content)
	// {
		// $products_specif = self::getProductsFromSpecification($content);
		// return array_merge($content, $products_specif);
	// }

	// private static function getProductsFromSpecification($content)
	// {
		// $products_all_specif = [];
		// foreach ($content as $product) {
			// if (!$product->specification) continue;
			// $products_specif = self::countOrderQuantity($product->specification, $product->orderQtyAll);
			// $products_all_specif = array_merge($products_all_specif, $products_specif);
			
		// }
		// return $products_all_specif;
	// }
	
	//считает количество деталей спецификации если заказано несколько изделий
	// private static function countOrderQuantity($products, $order_qty)
	// {
		// foreach ($products as $product) {
			// $product->orderQtyAll = $product->quantity * $order_qty;
		// }
		// return $products;
	// }
	
	// private static function groupProducts($products)
	// {
		// $products_group = [];
		// $ids = Helper::getArrayPropertyFromArrayObjects($products, 'id');
		// $ids_same = Helper::getSameValuesArray($ids);
		// if (empty($ids_same)) return $products;
		// return self::groupSameProducts($products, $ids_same);
	// }
	
	// private static function groupSameProducts($products, $ids_same)
	// {
		// foreach ($ids_same as $id) {
			// $same_products = Helper::getObjectsWithSameId($products, $id);
			// $total_qty = self::getTotalQuantity($same_products);
			// $total_product = $same_products[0];
			// $total_product->orderQtyAll = $total_qty;
			// $products = Helper::deleteObjectsFromArrayById($products, $id);
			// $products[] = $total_product; 
		// }
		// return $products;
	// }
	
	// private static function getTotalQuantity($products)
	// {
		// $total_qty = 0;
		// foreach ($products as $product) {
			// $total_qty = $total_qty + $product->orderQtyAll;
		// }
		// return $total_qty;
	// }
	
	public function getProducts($order)
	{
		$items = $this->extractSymbolsAndQuantity($order);
		if ($items) return $this->searchProductsBySymbol($items);
	}
	
	public function extractSymbolsAndQuantity($order)
	{
		$items = [];
		for ($i = 0; $i < count($order->positions); $i++) {
			if (strpos($order->positions[$i]->symbol, 'x') === false) continue;
		    list($symbol, $remain) = explode('x', $order->positions[$i]->symbol);
			$items[$i] = (object)['symbol' => $symbol, 'qty' => $order->positions[$i]->qty, 'id_order' => $order->id];
		}
		return $items;
	}
	
	public function searchProductsBySymbol($items)
	{
		$products = [];
		foreach ($items as $item) {
			$result = (new Product)->getAllBySymbol($item->symbol);
			if ($result) $products[] = (object)['id' => $result[0]->id, 'id_order' => $item->id_order, 'qty' => $result[0]->qty * $item->qty];
		}
		return $products;
	}
	

	
	

}