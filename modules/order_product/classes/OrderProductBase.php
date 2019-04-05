<?php

class OrderProductBase extends Model {
	
    const STATE_PROGRESS = 1; //работа выполняется
    const STATE_STOPPED = 2; //работа остановлена по какой то причине
    const STATE_ENDED = 3; //работа закончена
    const STATE_WAITING = 4; //отложен или не выдан
	
	const ID_MAIN_PARENT = 0;
	
	public $actions;
	public $stateString;
	public $stateBg;
	public $order;
	public $parent;
	
	public $specification;
	public $specificationGroup;
	public $specificationAll; //on all levels
	
		//for convert specification

}























