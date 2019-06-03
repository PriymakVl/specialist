<?php

trait OrderActionTimeFact {
	
	public function setTimeFact()
	{
		$this->timeFact = $this->calculateTimeFact($this);
		if ($this->timeFact && $this->timeFact > Date::HOUR_MINUTES) $this->timeFactDivision = Date::convertMinutesToHours($this->timeFact);
		return $this;
	}
	
	public function calculateTimeFact($action)
	{
		$time_fact = 0;
		if (!$action->states || count($action->states) == 1) return $time_fact;
		foreach ($action->states as $state) {
			if ($state->state == OrderActionState::PROGRESS) $time_fact += $state->duration;
		}
		return $time_fact;
	}
	
	public function calculateTimeFactProduct($id_prod)
	{
		$product_time = 0;
		$actions = $this->getByIdProductModel($id_prod);
		if (!$actions) return $product_time;
		foreach ($actions as $action) {
			$action = (new self)->setData($action)->getStates();
			$product_time += $this->calculateTimeFact($action);
		}
		return $product_time;
	}
	

	

}