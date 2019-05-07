<?php

trait OrderActionTime {

	use OrderActionTimePlan, OrderActionTimeFact;
	
	private function setDateReady($actions)
	{
		$time_plan_total = 0;
		foreach ($actions as $action) {
			if ($action->state == OrderActionState::WAITING) continue;
			$time_plan_total += $this->calculateTimePlan($action);
			$action->dateReady = Date::calculateDateReady($time_plan_total);
		}
		return $actions;
	}
	
	private function editDateEnd($state = false)
	{
		$state = $state ? $state : $this->get->state;
		if ($state == OrderActionState::ENDED) $this->updateDateEndModel();
	}
}