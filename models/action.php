<?php
require_once('action_static.php');

class Action extends ActionStatic {

	public function __construct($id_action)
    {
        $this->tableName = 'actions';
        parent::__construct($id_action);
    }
	
}