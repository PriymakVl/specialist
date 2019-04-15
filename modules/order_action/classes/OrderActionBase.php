<?php

class OrderActionBase extends Model {

	public $product;
	public $order;
	public $states;
	public $stateString;
	public $stateBg;
	
	public $action;//объект операции обработки
	public $bgTerminalBox;
	
	public $timeMade;
	
	const BG_TERMINAL_BOX_PLAN = 'yellow';
	const BG_TERMINAL_BOX_PROGRESS = 'green';
	const BG_TERMINAL_BOX_STOPPED = 'red';
	const BG_TERMINAL_BOX_PRIORITY = 'Aqua';
	
	const RATING_DEFAULT = 1;
	
	public function __construct($id = false)
    {
        $this->tableName = 'order_actions';
        parent::__construct($id);
		$this->message->section = 'order_action';
    }
	
	

	


	
	
}























