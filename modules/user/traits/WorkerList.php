<?php

trait WorkerList {

	public function getWorkers()
	{
		$items= $this->selectItemsWorkers();
        // if ($items)  $workers = ObjectHelper::createArray($items, 'Worker', 'setData', 'setProperties', 'getActions', 'calculateTimePlan');
		foreach ($items as $item) {
			$workers[] = (new self)->setData($item)->setProperties()->getActions()->calculateTimePlan();
		}
		if (isset($workers)) return $this->selectWorkersByTypeOrder($workers);
	}
	
	// public function getWorkers()
	// {
		// $items = $this->selectItemsWorkers();
		// if (!$items) return;
		// foreach ($items as $item) {
			// $workers[] = (new self)->setData($item)->setProperties()->getActions()->calculateTimePlan();
		// }
		// return $this->selectWorkersByTypeOrder($workers);
	// }
	
	


}