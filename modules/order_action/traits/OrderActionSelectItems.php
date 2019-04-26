<?php

trait OrderActionSelectItems {

	private function selectItemsForTerminal($items)
	{
		if (!$items) return false;
		$terminal = [];
		foreach ($items as $item) {
			if ($item->state != OrderActionState::ENDED && $item->state != OrderActionState::WAITING) $terminal[] = $item;
		}
		return $terminal;
	}
	
	private function selectItemsForPlan($items)
	{
		if (!$items) return false;
		$plan = [];
		foreach ($items as $item) {
			if ($item->state != OrderActionState::ENDED) $plan[] = $item;
		}
		return $plan;
	}
	
	private function selectItemsByNames($items, $default = true)
	{
		if (!$items) return;
		$default_names = (new Action)->getArrayNames();
		foreach ($items as $item) {
			if ($default) { 
				if (in_array($item->name, $default_names)) $select[] = $item; }
			else {
				if (!in_array($item->name, $default_names)) $select[] = $item; }
		}
		if (isset($select)) return $select;
	}
	
	private function selectItemsByNamesForOrder($default = true)
	{
		$items = $this->getIdOrderParam();
		$items = $this->getByIdOrderModel($items);
		return $this->selectItemsByNames($items, $default);
	}
	
	private function selectItemsByNameForOrder()
	{
		$id_order = $this->getIdOrderParam();
		$items = $this->getByIdOrderModel();
		if (!$items) return;
		$select = [];
		foreach ($items as $item) {
			if ($item ->name == $this->get->action) $select[] = $item;
		}
		return $select;
	}
	
	public function selectItemsNotEnded($items)
	{
		if (!$items) return;
		foreach ($items as $item) {
			if ($item->state != OrderActionState::ENDED) $select[] = $item;
		}
		if (isset($select)) return $select;
	}
	
	public function selectItemsWithoutCurrent($items)
	{
		if (!$items) return;
		foreach ($items as  $item) {
			if ($item->id != $this->id) $select[] = $item;
		}
		if (isset($select)) return $select;
	}
	
	public function selectItemsForWorker($items, $worker) {
		if (!$items) return;
		foreach ($items as $item) {
			if ($item->id_worker == $worker->id) $actions[] = $item;
			else {
				$result = $this->compareWidthDefaultActionsWorker($item, $worker->defaultProductActions);
				if ($result) $actions[] = $item;
			}
		}
		if (isset($actions)) return $actions;
	}
	
	public function compareWidthDefaultActionsWorker($item, $worker_default_actions) 
	{
		if (!$worker_default_actions) return false;
		foreach ($worker_default_actions as $default_action) {
			if ($item->name == $default_action) return true; 
		}
	}



}