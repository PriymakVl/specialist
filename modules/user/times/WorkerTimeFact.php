<?php

trait WorkerTimeFact {
	
	public function getTimeFact()
	{
		$this->timeFact = $this->calculateTimeFact();
		if ($this->timeFact >= Date::HOUR_MINUTES) $this->timeFactHour = Date::convertMinutesToHours($this->timeFactHour);
		$this->timePlanMade = $this->calculateTimePlanMadeActions();
		if ($this->timePlanMade >= Date::HOUR_MINUTES) $this->timePlanMadeHour = Date::convertMinutesToHours($this->timePlanMade);
		$this->differenceTime = $this->calculateDifferenceTime();
	}
	
	private function calculateTimeFact()
	{
		$time_fact = 0;
		if (!$this->actionsMade) return $time_fact;
		foreach ($this->actionsMade as $action) {
			$time_fact += (new OrderAction)->calculateTimeFact($action);
		}
		return $time_fact;
	}

}