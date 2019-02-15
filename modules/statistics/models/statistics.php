<?php

require_once ('statistics_base.php');

class Statistics extends StatisticsBase {
	
	const TIME_FULL_WORKING_DAY = 23400;//рабочее время в сутках в секундах при 8ч рабочем дне (6ч 30мин)
	
	// public static function getTimeManufacturingOrderForWorker($order, $worker) {
		// $products = OrderProducts::getForWorker($order, $worker);
		// foreach ($products as $product) {
			// $order->timeManufacturingForWorker = $order->timeManufacturingForWorker + $product->timeManufacturingAll;
		// }
	// }
	
	public static function getTimeManufacturingPlan($products)
	{
		$time_load_worker = 0;
		foreach ($products as $product) {
			if ($product->timeManufacturingOrder) $time_load_worker = $time_load_worker + $product->timeManufacturingOrder;
		}
		return $time_load_worker;
	}
	
	//load plan worker in seconds 
	public static function checkTimeManufacturing($products)
	{
		foreach ($products as $product) {
			if (!$product->timeManufacturingOrder) return false;
		}
		return true;
	}
	
	//load plan worker in percent 
	public static function getLoadPercentage($load_time)
	{
		if (!$load_time) return false;
		return round(($load_time * 100) / self::TIME_FULL_WORKING_DAY);
	}
	

}