<?php

trait OrderDateReady {

	private function setDateReady($orders)
	{
		$time_manufacturing_total = 0;
		foreach ($orders as $order) {
			$time_manufacturing_total += $this->calculateTimeManufacturing($order);
			$order->dateReady = Date::calculateDateReady($time_manufacturing_total);
		}
		return $orders;
	}
	
	private function calculateTimeManufacturing($order)
	{
		$time_manuf = 0;
		if (!$order->actions) return $time_manuf;
		foreach ($order->actions as $action) {
			$time_manuf += (new OrderAction)->calculateTimeManufacturing($action);
		}
		return $time_manuf;
	}
	


}