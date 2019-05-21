<?php

trait OrderActionSelect {
	
	private function selectByDefaultNames($items, $default = true)
	{
		if (!$items) return;
		$default_names = (new Action)->getArrayNames();
		foreach ($items as $item) {
			if ($default) { 
				if (in_array($item->name, $default_names)) $select[] = $item; 
			}
			else {
				if (!in_array($item->name, $default_names)) $select[] = $item; 
			}
		}
		if (isset($select)) return $select;
	}
	
	public function selectWithoutCurrent($items)
	{
		if (!$items) return;
		foreach ($items as  $item) {
			if ($item->id != $this->id) $select[] = $item;
		}
		if (isset($select)) return $select;
	}
	
	public function selectForWorker($items, $worker = false) {
		if (!$items) return;
		if (!$worker) $worker = (new Worker)->setData($this->session->id_user)->setProperties();
		foreach ($items as $item) {
			if ($item->id_worker == $worker->id) $actions[] = $item;
			else if (in_array($item->name, $worker->defaultProductActions)) $actions[] = $item;
		}
		if (isset($actions)) return $actions;
	}
	
	public function selectForWorkerFact($items, $id_worker)
	{
		foreach ($items as $item) {
			$users = (new OrderActionState)->getIdUsersActionModel($item->id);
			if (in_array($id_worker, $users)) $select[] = $item;
		}
		if (isset($select)) return $select;
	}
	


}