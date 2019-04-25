<?php

class Worker extends WorkerBase {
	
	use WorkerTotal, WorkerList;
	
	public function getActionsPlan($params)
	{
		$items = OrderAction::planWorker($params);
		if (empty($items)) return $this;
		foreach ($items as $item) {
			$action = new OrderAction($item->id);
			$action->getProduct()->getOrder();
			$this->actions[] = $action;
		}
		return $this;
	}
	
	public function getActionsMade($params)
	{
		$items = OrderAction::madeWorker($params);
		if (empty($items)) return $this;
		foreach ($items as $item) {
			$action = new OrderAction($item->id);
			$action->getProduct()->getOrder()->countFactTimeManufact();
			$this->actions[] = $action;
		}
		return $this;
	}
	
	public function countTotalTimeForPeriod()
	{
		foreach ($this->actions as $action) {
			if ($action->timeMade) $this->totalTimeMade = $this->totalTimeMade + $action->timeMade;
			$this->totalIimePlan = $this->totalTimePlan + $action->time_manufac;
		}
		return $this;
	}
	
	public function countTimePlan()
	{
		$params = ParamWorker::plan($this->login);
		$items = OrderAction::planWorker($params);
		if (empty($items)) return $this;
		foreach ($items as $item) {
			if ($item->time_manufac) { $this->timePlan = $this->timePlan + $item->time_manufac; }
		}
		$this->timePlan = round($this->timePlan);
		return $this;
	}
	
	public function countTimeMade()
	{
		$params = ParamWorker::made($this->id);
		$worker = $this->getActionsMade($params);
		if (!$worker->actions) return $this;
		foreach ($worker->actions as $action) {
			if($action->timeMade) $this->timeMade = $this->timeMade + $action->timeMade;
		}
		$this->timeMade = round($this->timeMade);
		return $this;
	}
	
	public function countLoad()
	{
		$this->loadPercent = Statistics::countLoadPercentage($this->timePlan);
		return $this;
	}
	
	public function costMade()
	{
		if (empty($this->actions)) return $this;
		foreach ($this->actions as $action) {
			if ($action->price && $action->time_manufac) $this->costMade = $this->costMade + ($action->time_manufac * $action->price);
		}
		$this->costMade = round($this->costMade, 2);
		return $this;
	}
	
	
	
	
	
	
	
	
	
    
	
}























