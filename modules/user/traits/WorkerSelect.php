<?php

trait WorkerSelect {
	
	public function selectWorkers()
	{
		$items = self::getAll('users');
		if (!$items) return;
		$workers = [];
		foreach ($items as $item) {
			if ($item->position == self::POSITION_WORKER) $workers[] = $item;
		}
		return $workers;
	}
	
	public function selectWorkersByTypeOrder($workers) 
	{
		if (!$workers) return;
		if (!$this->get->type_order) return $workers;
		foreach ($workers as $worker) {
			if ($worker->defaultTypeOrder == $this->get->type_order) $select[] = $worker;
		}
		if (isset($select)) return $select;
	}
}