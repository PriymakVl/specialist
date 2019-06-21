<?php

trait OrderDateReady {

	private function setDateReady($orders)
	{
		$time_manufacturing_total = 0;
		$time_start = time();
		foreach ($orders as $order) {
			$time_manufacturing_total += $this->calculateTimePlan($order);
			$date_ready = Date::calculateDateReady($time_manufacturing_total, $time_start);
			// debug(date('d.m.y', $date_ready));
			$dayofweek = date('w', $date_ready);
        	if ($dayofweek == Date::SATURDAY_NUMBER) {
        		$date_ready += (2 * Date::DAY_SECOND);
        		$time_start += (2 * Date::DAY_SECOND);
        	}
        	else if ($dayofweek == Date::SUNDAY_NUMBER) {
        		$date_ready += Date::DAY_SECOND;
        		$time_start += Date::DAY_SECOND;
        	} 
			$order->dateReady = $date_ready;
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