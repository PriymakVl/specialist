<?php

trait OrderActionDateReady {

	private function setDateReady($actions)
	{
		$time_manufacturing_total = 0;
		foreach ($actions as $action) {
			$time_manufacturing_total += $this->calculateTimeManufacturing($action);
			$action->dateReady = Date::calculateDateReady($time_manufacturing_total);
		}
		return $actions;
	}
	
	public function calculateTimeManufacturing($action)
	{
		$time_manuf = 0;
		$time_prepar = $action->time_prepar ? $action->time_prepar : 0;
		$qty = $action->qty ? $action->qty : 1;
		if ($action->time_prod) $time_manuf = ($action->time_prod * $qty) + $time_prepar;
		return $time_manuf;
	}

}