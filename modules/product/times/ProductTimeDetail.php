<?php

trait ProductTimeDetail {

	public function calculateTimePlanDetail($qty = true)
	{
		$time_prod = $this->calculateTimePlanProduction();
		if ($qty) $time_prod = $time_prod * $this->qty;
		$time_prepar = $this->calculateTimePlanPreparation();
		return $time_prod + $time_prepar;
	}
	
	private function calculateTimePlanProduction()
	{
		$time_prod_total = 0;
		if (!$this->actions) return $time_prod_total;
		foreach ($this->actions as $action) {
			if ($action->time_prod) $time_prod_total += $action->time_prod;
		}
		return $time_prod_total;
	}
	
	public function calculateTimePlanPreparation()
	{
		$time_prepar_total = 0;
		if (!$this->actions) return $time_prepar_total;
		foreach ($this->actions as $action) {
			if ($action->time_prepar) $time_prepar_total += $action->time_prepar;
		}
		return $time_prepar_total;
	}

	public function calculateTimeAverage()
	{
		if (!$this->actions) return $this;
		//$this->callMethods($this->actions, ['setTimeAverage']);
		foreach ($this->actions as $action)
		{
			$action->setTime();
		}
		return $this;
	}
	
	

}