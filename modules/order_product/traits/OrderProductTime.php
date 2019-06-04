<?php

trait OrderProductTime {
	
	public function calculateTimeFact()
	{
		$this->timeFact = (new OrderAction)->calculateTimeFactProduct($this->id);
		return $this;
	}

	public function calculateTimeFactActions()
	{
		if (!$this->actions) return $this;
		foreach ($this->actions as $action) {
			$action->getStates()->setTimePlan()->setTimeFact();
		}
		return $this;
	}
	
	

}