<?php

trait OrderActionCheckState {

	private function checkStateProductWaiting($actions)
	{
		foreach ($actions as $action) {
			if ($action->state != OrderActionState::WAITING) return false;
		}
		return true;
	}
	
	public function checkStateProduct()
	{
		if ($this->id_prod) (new OrderProduct)->setData($this->id_prod)->checkState();
		return $this;
	}


}