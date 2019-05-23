<?php

class OrderActionBase extends Model {

	public $product;
	public $order;
	public $worker;
	
	public $isStates = false;
	public $states;
	
	public $stateString;
	public $stateBg;
	
	// public $action;//объект операции обработки
	public $bgTerminalBox;
	
	// public $timeMade;
	public $dateReady;
	public $timePlan; //time preparation + time production
	public $timeFact; //summa of states action
	public $timeFactDivision; // time fact in hour
	public $timePlanDivision; // time plna in hour
	
	const BG_TERMINAL_BOX_PLAN = 'yellow';
	const BG_TERMINAL_BOX_PROGRESS = 'green';
	const BG_TERMINAL_BOX_STOPPED = 'red';
	const BG_TERMINAL_BOX_PRIORITY = 'Aqua';
	
	const RATING_DEFAULT = 0;
	
	public function __construct($id = false)
    {
        $this->tableName = 'order_actions';
        parent::__construct($id);
		$this->message->section = 'order_action';
    }
	
	

	


	
	
}























