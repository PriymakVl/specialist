<?php

trait ProductActionTime {
	
	public function setTime()
	{
		$this->timePlan = $this->calculateTimePlan();
		$this->setTimeAverage();
		return $this;
	}
	public function setTimeAverage()
	{
		$result = (new OrderProduct)->getAllBySymbolModel($this->symbol);
		if (!$result) return;
		$product = (new OrderProduct)->setData($result[0])->getActions();//->calculateTimeActions();
		if (!$product->actions) return;
		foreach ($product->actions as $action) {
			if ($this->name == $action->name && $this->note == $action->note) {
				$action->setTimeAverage();
				$this->timeAverage = $this->calculateTimeAverage($action->arrayTimesFact);
			}
		}
	}

	public function calculateTimePlan()
	{
		if (!$this->time_prepar) $this->time_prepar = 0;
		if (!$this->time_prod) $this_time_prod = 0;
		return $this->time_prod + $this->time_prepar;
	}

	public function calculateTimeAverage($times)
	{
		if (!$times) return;
		$times_select = $this->selectArrayFactTimes($times);
		if ($times_select) return ceil(array_sum($times_select) / count($times_select));
	}

	private function selectArrayFactTimes($times)
	{
		if (!$this->timePlan) return $times;
		$time_min = $this->timePlan / 2;
		$time_max = $this->timePlan * 5;
		$time_select = [];
		foreach ($times as $time)
		{
			if ($time <= $time_max && $time >= $time_min) $time_select[] = $time;
		}
		return $time_select;
	}
}