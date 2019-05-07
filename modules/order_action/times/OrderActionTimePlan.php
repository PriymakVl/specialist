<?php

trait OrderActionTimePlan {

	public function setTimePlan()
	{
		$this->timePlan = $this->calculateTimePlan($this);
		return $this;
	}
	
	public function calculateTimePlan($action)
	{
		$time_plan = 0;
		$time_prepar = $action->time_prepar ? $action->time_prepar : 0;
		$qty = $action->qty ? $action->qty : 1;
		if ($action->time_prod) $time_plan = ($action->time_prod * $qty) + $time_prepar;
		return $time_plan;
	}
	

}