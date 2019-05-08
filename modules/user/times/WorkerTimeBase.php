<?php

trait WorkerTimeBase {

	use WorkerTimePlan, WorkerTimeFact;
	
	public function calculateDifferenceTime()
	{
		if ($this->timePlanMade && $this->timeFact) return $this->timePlanMade - $this->timeFact;
	}
	
	public function calculateCost()
	{
		if (!$this->actionsMade) return $this;
		foreach ($this->actionsMade as $action) {
			if ($action->timePlan && $action->price) $this->cost += $action->timePlan * $action->price;
		}
		if ($this->cost) $this->cost = round($this->cost, 2);
		return $this;
	}
	
}