<?php

class OrderActionBase extends Model {

	public $product;
	public $order;
	public $states;
	public $convertState;
	public $action;//объект операции обработки
	public $bgState;
	public $bgTerminalBox;
	
	public $name;
	public $price;
	public $timeMade;
	
	const BG_TERMINAL_BOX_PLAN = 'yellow';
	const BG_TERMINAL_BOX_PROGRESS = 'green';
	const BG_TERMINAL_BOX_STOPPED = 'red';
	const BG_TERMINAL_BOX_PRIORITY = 'Aqua';
	
	
	public function getProperties()
	{
		$item = new DataAction($this->id_data);
		$this->name = $item->name;
		$this->price = $item->price;
	}

	


	
	
}























