<?php

trait WorkerList {

	public function getWorkersForPlan($all = false)
	{
		$items= $this->selectWorkers();
		if (!$items) return;
		$workers = ObjectHelper::createArray($items, 'Worker', ['setData', 'setProperties', 'getActions', 'getTimePlan']);
		if (isset($workers) && $all === false) return $this->selectWorkersByTypeOrder($workers);
		else if (isset($workers)) return $workers;
	}
	
	public function getWorkersForStatistics($all = false)
	{
		$items= $this->selectWorkers();
		if (!$items) return;
		$workers = ObjectHelper::createArray($items, 'Worker', ['setData', 'setProperties', 'getActionsMade']);//, 'getTimeFact', 'calculateCost'
		if (isset($workers) && $all === false) return $this->selectWorkersByTypeOrder($workers);
		else if (isset($workers)) return $workers;
	}
	
	public function getWorkers($all = false) 
	{
		$items= $this->selectWorkers();
		if (!$items) return;
		$workers = ObjectHelper::createArray($items, 'Worker', ['setData', 'setProperties']);
		if (isset($workers) && $all === false) return $this->selectWorkersByTypeOrder($workers);
		else if (isset($workers)) return $workers;
	}
	
	
	


}