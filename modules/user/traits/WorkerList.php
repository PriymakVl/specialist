<?php

trait WorkerList {

	public function getWorkers($all = false)
	{
		$items= $this->selectItemsWorkers();
		foreach ($items as $item) {
			$workers[] = (new self)->setData($item)->setProperties()->getActions()->calculateTimePlan();
		}
		if (isset($workers) && $all === false) return $this->selectWorkersByTypeOrder($workers);
		else if (isset($workers)) return $workers;
	}
	
	
	


}