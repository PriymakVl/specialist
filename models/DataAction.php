<?php

class DataAction extends Model {

	public function __construct($id = false)
    {
        $this->tableName = 'data_actions';
        parent::__construct($id);
		$this->message->section = 'data_actions';
    }
	
}