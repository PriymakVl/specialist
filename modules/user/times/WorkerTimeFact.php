<?php

trait WorkerTimeFact {
	
	public function getTimeFact()
	{
		$this->timeFact = $this->calculateTimeFact();
		$this->timePlanMade = $this->calculateTimePlanMadeActions();
	}
	
	private function calculateTimeFact()
	{
		$time_fact = 0;
		if (!$this->actionsMade) return $time_fact;
		foreach ($this->actionsMade as $action) {
			debug((new OrderAction)->calculateTimeFact($action), false);
			$time_fact += (new OrderAction)->calculateTimeFact($action);
		}
		return $time_fact;
	}
	
	// public function costMade()
	// {
		// if (empty($this->actions)) return $this;
		// foreach ($this->actions as $action) {
			// if ($action->price && $action->time_manufac) $this->costMade = $this->costMade + ($action->time_manufac * $action->price);
		// }
		// $this->costMade = round($this->costMade, 2);
		// return $this;
	// }
}