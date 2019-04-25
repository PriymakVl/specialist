<?php

trait WorkerList {

	public function getWorkers()
	{
		$items = $this->getWorkersModel();
		if ($items) $workers = selectByTypeOrder($items);
        if ($workers) return ObjectHelper::createArray($workers, 'Worker');
        return false;
	}
	
	


}