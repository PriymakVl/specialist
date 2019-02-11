<?php

require_once ('statistics_base.php');

class Statistics extends StatisticsBase {
	
	public static function getTimeManufacturingOrderForWorker($order, $worker) {
		$products = OrderProducts::getForWorker($order, $worker);
		foreach ($products as $product) {
			$order->timeManufacturingForWorker = $order->timeManufacturingForWorker + $product->timeManufacturingAll;
		}
	}

}