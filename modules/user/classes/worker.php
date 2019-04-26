<?php

class Worker extends WorkerBase {
	
	use WorkerTotal, WorkerList, WorkerSelect, WorkerPlan, WorkerConvert; //WorkerStatistics
	
	
	public function getWorkers()
	{
		$items = $this->selectItemsWorkers();
		if (!$items) return;
		foreach ($items as $item) {
			$workers[] = (new self)->setData($item)->setProperties()->getActions()->calculateTimePlan();
		}
		return $this->selectWorkersByTypeOrder($workers);
	}
	
	public function getActions()
	{
		$this->actions = (new OrderAction)->getForWorker($this);
		return $this;
	}
	
	
	
	
	
	
	
	
	
	
    
	
}























