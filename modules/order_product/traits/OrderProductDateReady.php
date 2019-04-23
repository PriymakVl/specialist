<?php

trait OrderProductDateReady {

	private function setDateReady($products)
	{
		$time_manufacturing_total = 0;
		foreach ($products as $product) {
			$time_manufacturing_total += $this->calculateTimeManufacturing($product);
			$product->dateReady = Date::calculateDateReady($time_manufacturing_total);
		}
		return $products;
	}
	
	private function calculateTimeManufacturing($product)
	{
		$time_manuf = 0;
		if (!$product->actions) return $time_manuf;
		foreach ($product->actions as $action) {
			$time_manuf += (new OrderAction)->calculateTimeManufacturing($action);
		}
		return $time_manuf;
	}
	
	private function calculateDateReady($time_manufacturing_total)
	{
		$workin_daty_minutes = 360; // 6 hour
		$qty_work_days = round($time_manufacturing_total / $workin_daty_minutes);
		if ($qty_work_days < 1) $qty_work_days = 1;
		return time() + ($qty_work_days * 24 * 3600); 
	}
}