<?php

trait OrderProductTime {
	
	public function calculateTimeFact()
	{
		$this->timeFact = (new OrderAction)->calculateTimeFactProduct($this->id);
		if ($this->timeFact && $this->timeFact > Date::HOUR_MINUTES) $this->timeFactDivision = Date::convertMinutesToHours($this->timeFact);
		return $this;
	}

	public function calculateTimeActions()
	{
		if (!$this->actions) return $this;
		foreach ($this->actions as $action) {
			$action->getStates()->setTimePlan()->setTimeFact()->setTimeAverage();
		}
		return $this;
	}
	
	

}