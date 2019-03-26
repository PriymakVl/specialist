<?php
require_once('product_base.php');

class ProductTime extends ProductBase {

	public static function countTimeProductSpecification($product)
	{
		$time_total = 0;
		foreach ($product->specification as $item) {
			$time_total = $time_total + $item->timeActions;
		}
		return $time_total;
	}
	
	public static function countTimeProductActions($actions, $qty) 
	{
		$time_production = self::countTimeProductionProductActions($actions, $qty);
		$time_preparation = self::countTimePreparationProductActions($actions);
		return $time_production + $time_preparation;
	}
	
	private static function countTimeProductionProductActions($actions, $qty)
	{
		$time_total = 0;
		foreach ($actions as $action) {
			$time_total = $time_total + ($action->time_prod  * $qty);
		}
		return $time_total;
	}
	
	private static function countTimePreparationProductActions($actions)
	{
		$time_total = 0;
		foreach ($actions as $action) {
			$time_total = $time_total + $action->time_prepar;
		}
		return $time_total;
	}
	
	
}