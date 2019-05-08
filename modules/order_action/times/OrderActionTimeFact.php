<?php

trait OrderActionTimeFact {
	
	public function setTimeFact()
	{
		$this->timeFact = $this->calculateTimeFact($this);
		return $this;
	}
	
	public function calculateTimeFact($action)
	{
		$time_fact = 0;
		if (!$action->states || count($action->states) == 1) return $time_fact;
		foreach ($action->states as $state) {
			if ($state->state == OrderActionState::PROGRESS) $time_fact += $state->duration;
		}
		return $time_fact;
	}
	

	

}