<?php

trait WorkerTimePlan {


	public function getTimePlan()
	{
		$this->timePlan = $this->calculateTimePlan();
		if ($this->timePlan >= Date::HOUR_MINUTES) $this->timePlanHour = Date::convertMinutesToHours($this->timePlan);
		$this->calculateTimePlanPercent();
		return $this;
	}
	
	public function calculateTimePlan()
	{
		$time_plan = 0;
		if (!$this->actions) return ;
		foreach ($this->actions as $action) {
			$time_plan += (new OrderAction)->calculateTimePlan($action);
		}
		return $time_plan;
	}
	
	public function calculateTimePlanPercent()
	{
		if ($this->timePlan) $this->timePlanPercent = round(($this->timePlan / self::TIME_FULL_WORKING_DAY) * 100);
		return $this;
	}
	
	public function calculateTimePlanMadeActions()
	{
		$time_plan_made = 0;
		if (!$this->actionsMade) return $time_plan_made;
		foreach ($this->actionsMade as $action) {
			$time_plan_made += (new OrderAction)->calculateTimePlan($action);
		}
		return $time_plan_made;
	}
}