<?php

trait OrderDateReady {

	private function setDateReady($orders)
	{
		$time_manufacturing_total = 0;
		foreach ($orders as $order) {
			$time_manufacturing_total += $this->calculateTimePlan($order);
			$order->dateReady = Date::calculateDateReady($time_manufacturing_total);
		}
		return $orders;
	}
	
	private function calculateTimePlan($order)
	{
		$time_manuf = 0;
		if (!$order->actions) return $time_manuf;
		foreach ($order->actions as $action) {
			if ($action->state != OrderActionState::ENDED) $time_manuf += (new OrderAction)->calculateTimePlan($action);
		}
		return $time_manuf;
	}
	


}