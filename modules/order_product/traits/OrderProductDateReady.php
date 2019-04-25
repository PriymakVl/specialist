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
		$product->getActionsAll();
		if (!$product->actionsAll) return $time_manuf;
		foreach ($product->actionsAll as $action) {
			if ($action->state != OrderActionState::ENDED && $action->state != OrderActionState::WAITING) $time_manuf += (new OrderAction)->calculateTimeManufacturing($action);
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