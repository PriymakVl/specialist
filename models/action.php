<?php
require_once('action_static.php');

class Action extends ActionStatic {

	public function __construct($id)
    {
        $this->tableName = 'actions';
        parent::__construct($id);
    }
	
}