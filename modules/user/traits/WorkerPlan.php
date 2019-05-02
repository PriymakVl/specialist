<?php

trait WorkerPlan {


	public function calculateTimePlan()
	{
		if (!$this->actions) return $this;
		foreach ($this->actions as $action) {
			$this->timePlan += (new OrderAction)->calculateTimeManufacturing($action);
		}
		$this->convertTimePlanToHours();
		$this->calculateTimePlanPercent();
		return $this;
	}
	
	public function calculateTimePlanPercent()
	{
		if ($this->timePlan) $this->timePlanPercent = round(($this->timePlan / self::TIME_FULL_WORKING_DAY) * 100);
		return $this;
	}
}