<?php

class WorkerBase extends User {

	//public $productsCut;
	 public $timePlan = 0;
	 public $timeMade = 0;
	 public $totalTimeMade = 0;
	 public $totalTimePlan = 0;
	 public $loadPercent = 0;
	 //public $loadFullFlage; //если указана трудоемкость для всех деталей
	 //public $defaultActions;
	 public $costMade; //сколько заработал
	 public $actions;
	 public $actions_unplan;
	 
	 public $defaultAction;
	 
	 public function setPropeties()
	 {
		$this->options = UserOptions::get($this->id);
		if (isset($this->options->default_action)) $this->defaultAction = $this->options->default_action; ; 
		if (isset($this->options->default_type_order)) $this->defaultTypeOrder = $this->options->default_type_order;
		return $this;
	 }
}
