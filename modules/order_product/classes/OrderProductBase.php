<?php

class OrderProductBase extends Model {
	
	const STATE_PLANED = 1; //работа запланирована
    const STATE_PROGRESS = 2; //работа выполняется
    const STATE_STOPPED = 3; //работа остановлена по какой то причине
    const STATE_ENDED = 4; //работа закончена
    const STATE_WAITING = 5; //отложен или не выдан
	
	const ID_MAIN_ORDER = 0;//id_parent main contenr in order
	
	public $actions;
	public $stateString;
	public $stateBg;
	public $order;
	public $parent;
	
	public $specification;
	public $specificationGroup;
	public $specificationAll; //on all levels
	
	public function __construct($id = false)
	{
		$this->tableName = 'order_products';
		parent::__construct($id);
		$this->message->section = 'order_product';
	}

}























