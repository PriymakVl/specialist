<?php
require_once('product_base.php');

class ProductTime extends ProductBase {

	public static function countTimeManufacSpecif($products)
	{
		$time_total = 0;
		foreach ($products as $product) {
			$time_manuf = self::countTimeManufacturing($product);
			$time_total = $time_total + $tim_manuf;
		}
		return $time_total;
	}
	
	public static function countTimeManufacturing($product)
	{
		$prod_actions = ProductAction::getAllBySymbol($product->symbol);
		if (empty($prod_actions)) return 0;
		$time_production = self::countTotalTimeProductionActions($prod_actions, $product->quantity);
		$time_preparation = self::countTotalTimePreparationActions($prod_actions);
		return $time_production + $time_preparation;
	}
	
	private static function countTotalTimeProductionActions($actions, $qty)
	{
		$time_total = 0;
		foreach ($actions as $action) {
			$time_total = $time_total + ($action->time_prod  * $qty);
		}
		return $time_total;
	}
	
	private static function countTotalTimePreparationActions($actions)
	{
		$time_total = 0;
		foreach ($actions as $action) {
			$time_total = $time_total + $action->time_prepar;
		}
		return $time_total;
	}
}