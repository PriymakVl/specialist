<?php

trait WorkerConvert {

	public function convertTimePlanToHours()
	{
		$hour_minutes = 60;
		if ($this->timePlan && $this->timePlan > $hour_minutes) $this->timePlanHour = Date::convertMinutesToHours($this->timePlan);
		return $this;
	}
}