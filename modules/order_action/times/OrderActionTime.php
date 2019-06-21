<?php

trait OrderActionTime {

	use OrderActionTimePlan, OrderActionTimeFact, OrderActionTimeAverage;
	
	private function setDateReady($actions)
	{
		$time_plan_total = 0;
		$time_start = time();
		foreach ($actions as $action) {
			if ($action->state == OrderActionState::WAITING) continue;
			$time_plan_total += $this->calculateTimePlan($action);
			$date_ready = Date::calculateDateReady($time_plan_total, $time_start);
			$dayofweek = date('w', $date_ready);
        	if ($dayofweek == Date::SATURDAY_NUMBER) {
        		$date_ready += (2 * Date::DAY_SECOND);
        		$time_start += (2 * Date::DAY_SECOND);
        	}
        	else if ($dayofweek == Date::SUNDAY_NUMBER) {
        		$date_ready += Date::DAY_SECOND;
        		$time_start += Date::DAY_SECOND;
        	} 
			$action->dateReady = $date_ready;
		}
		return $actions;
	}
	
	private function editDateEnd($state = false)
	{
		$state = $state ? $state : $this->get->state;
		if ($state == OrderActionState::ENDED) $this->updateDateEndModel();
	}
}