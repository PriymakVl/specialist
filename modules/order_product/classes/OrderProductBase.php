<?php

class OrderProductBase extends Model {
	
    const STATE_PROGRESS = 1; //работа выполняется
    const STATE_STOPPED = 2; //работа остановлена по какой то причине
    const STATE_ENDED = 3; //работа закончена
    const STATE_WAITING = 4; //отложена
	
	const ID_MAIN_PARENT = 0;
	
	public $options;
	public $specification;
	public $stateString;
	public $stateBg;
}























