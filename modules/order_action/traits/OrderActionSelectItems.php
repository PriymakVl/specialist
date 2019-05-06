<?php

trait OrderActionSelectItems {

	// private function selectItemsForTerminal($items)
	// {
		// if (!$items) return false;
		// $terminal = [];
		// foreach ($items as $item) {
			// if ($item->state != OrderActionState::ENDED && $item->state != OrderActionState::WAITING) $terminal[] = $item;
		// }
		// return $terminal;
	// }
	
	// private function selectItemsForPlan($items)
	// {
		// if (!$items) return false;
		// $plan = [];
		// foreach ($items as $item) {
			// if ($item->state != OrderActionState::ENDED) $plan[] = $item;
		// }
		// return $plan;
	// }
	
	private function selectItemsByDefaultNames($items, $default = true)
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
	
	private function selectItemsByName($items, $name)
	{
		if (!$items) return;
		foreach ($items as $item) {
			if ($item->name == $name) $select[] = $item;
		}
		if (isset($select)) return $select;
	}
	//if $not true select all but not current state
	public function selectItemsByState($items, $state, $not = false)
	{
		if (!$items) return;
		foreach ($items as $item) {
			if ($item->state == $state) $select[] = $item;
			else $select_not[] = $item;
		}
		if ($not & isset($select)) return $select_not;
		else if (isset($select)) return $select;
	}
	
	public function selectItemsByStates($items, array $states, $not = false)
	{
		if (!$items) return;
		$select = [];
		foreach ($states as $state) {
			$result = $this->selectItemsByState($items, $state, $not);
			if ($result) $select = array_merge($select, $result);
		} 
		if ($select) return $select;
	}
	
	private function selectItemsByTypeOrder($items)
	{
		$type_order = $this->getTypeOrderParam();
		foreach ($items as $item) {
			if ($item->type_order == $type_order) $select[] = $item;
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
	
	public function selectItemsForWorker($items, $worker = false) {
		if (!$items) return;
		if (!$worker) $worker = (new Worker)->setData($this->session->id_user);
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