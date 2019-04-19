<?php

class OrderActionStateBase extends OrderActionBase {

	const PLANED = 1; //работа запланирована
    const PROGRESS = 2; //работа выполняется
    const STOPPED = 3; //работа остановлена по какой то причине
    const ENDED = 4; //работа закончена
    const WAITING = 5; //ожидает окончание выполнения предыдущей операции
	
	public $duration;
	public $user;
	public $name; //name convert state
	public $bg; // backgroun field table
	
	public function __construct($id = false)
	{
		$this->tableName = 'order_action_states';
        parent::__construct($id);
		$this->message->section = 'order_action_states';
	}




}