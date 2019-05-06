<?php

class Worker extends WorkerBase {
	
	use WorkerTotal, WorkerList, WorkerSelect, WorkerPlan, WorkerConvert; //WorkerStatistics
	
	public function getActions()
	{
		$this->actions = (new OrderAction)->getForWorker($this);
		$this->getCurrentActions();
		return $this;
	}
	
	public function getActionsFact()
	{
		$this->actionsFact = (new OrderAction)->getForWorkerFact($this);
		return $this;
	}
	
	public function getCurrentActions()
	{
		$this->currentActions = $this->selectProperty($this->actions, 'state', OrderActionState::PROGRESS, true);
		$this->getCurrentActionsString();
		return $this;
	}
	
	
	
	
	
	
	
	
	
	
    
	
}























