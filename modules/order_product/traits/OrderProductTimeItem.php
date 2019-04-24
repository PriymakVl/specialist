<?php

trait OrderProductTimeItem {

	public function countTimeManufacturingItem()
	{
		$time_prod = $this->countTimeProductionActions();
		$time_prepar = $this->countTimePreparationActions();
		$this->timeManufacturingItem = $time_prod + $time_prepar;
		return $this;
	}
	
	private function countTimeProductionActions()
	{
		$time_prod_total = 0;
		if (!$this->actions) return $time_prod_total;
		foreach ($this->actions as $action) {
			if ($action->time_prod) $time_prod_total += ($action->time_prod * $this->qty);
		}
		return $time_prod_total;
	}
	
	public function countTimePreparationActions()
	{
		$time_prepar_total = 0;
		if (!$this->actions) return $time_prepar_total;
		foreach ($this->actions as $action) {
			if ($action->time_prepar) $time_prepar_total += $action->time_prepar;
		}
		return $time_prepar_total;
	}
	
	

}