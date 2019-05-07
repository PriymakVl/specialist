<?php

class Worker extends WorkerBase {
	
	use WorkerTotal, WorkerList, WorkerSelect, WorkerTimeBase, WorkerConvert;
	
	public function getActions()
	{
		$this->actions = (new OrderAction)->getForWorker($this);
		$this->getCurrentActions();
		return $this;
	}
	
	public function getActionsMade()
	{
		$this->actionsMade = (new OrderAction)->getForWorkerMade($this);
		return $this;
	}
	
	public function getCurrentActions()
	{
		$this->currentActions = $this->selectProperty($this->actions, 'state', OrderActionState::PROGRESS);
		$this->getCurrentActionsString();
		return $this;
	}
	
	
	
	
	
	
	
	
	
	
    
	
}























