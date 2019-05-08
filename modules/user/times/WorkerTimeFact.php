<?php

trait WorkerTimeFact {
	
	public function getTimeFact()
	{
		$this->timeFact = $this->calculateTimeFact();
		$this->timePlanMade = $this->calculateTimePlanMadeActions();
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