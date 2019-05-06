<?php

class Worker extends WorkerBase {
	
	use WorkerTotal, WorkerList, WorkerSelect, WorkerPlan, WorkerConvert; //WorkerStatistics
	
	public function getActions()
	{
		$this->actions = (new OrderAction)->getForWorker($this);
		$this->getCurrentActions();
		return $this;
	}
	
	public function getCurrentActions()
	{
		$current_actions = (new OrderAction)->selectItemsByState($this->actions, OrderActionState::PROGRESS);
		if (!$current_actions) return;
		$this->currentActions = $current_actions;
		$this->getCurrentActionsString();
		return $this;
	}
	
	
	
	
	
	
	
	
	
	
    
	
}























