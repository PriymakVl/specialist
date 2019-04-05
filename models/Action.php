<?php

class Action extends Model {

	public function __construct($id = false)
    {
        $this->tableName = 'actions';
        parent::__construct($id);
		$this->message->section = 'action';
    }
	
}