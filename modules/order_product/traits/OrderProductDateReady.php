<?php

trait OrderProductDateReady {

	private function setDateReady($products)
	{
		$time_manufacturing_total = 0;
		$time_start = time();
		foreach ($products as $product) {
			$time_manufacturing_total += $this->calculateTimePlan($product);
			$date_ready = Date::calculateDateReady($time_manufacturing_total, $time_start);
			$dayofweek = date('w', $date_ready);
        	if ($dayofweek == Date::SATURDAY_NUMBER) {
        		$date_ready += (2 * Date::DAY_SECOND);
        		$time_start += (2 * Date::DAY_SECOND);
        	}
        	else if ($dayofweek == Date::SUNDAY_NUMBER) {
        		$date_ready += Date::DAY_SECOND;
        		$time_start += Date::DAY_SECOND;
        	} 
			$product->dateReady = $date_ready;
		}
		return $products;
	}
	
	private function calculateTimePlan($product)
	{
		$time_manuf = 0;
		$product->getActionsAll();
		if (!$product->actionsAll) return $time_manuf;
		foreach ($product->actionsAll as $action) {
			if ($action->state != OrderActionState::ENDED && $action->state != OrderActionState::WAITING) $time_manuf += (new OrderAction)->calculateTimePlan($action);
		}
		return $time_manuf;
	}
	
// 	private function calculateDateReady($time_manufacturing_total)
// 	{
// 		$workin_daty_minutes = 360; // 6 hour
// 		$qty_work_days = round($time_manufacturing_total / $workin_daty_minutes);
// 		if ($qty_work_days < 1) $qty_work_days = 1;
// 		return time() + ($qty_work_days * 24 * 3600); 
// 	}
}