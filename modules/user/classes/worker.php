<?php

class Worker extends WorkerBase {
	
	use WorkerTotal, WorkerList, WorkerSelect, WorkerPlan, WorkerConvert; //WorkerStatistics
	
	public function getActions()
	{
		$this->actions = (new OrderAction)->getForWorker($this);
		return $this;
	}
	
	
	
	
	
	
	
	
	
	
    
	
}























