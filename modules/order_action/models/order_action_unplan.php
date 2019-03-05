<?php
require_once('order_action_unplan_static.php');

class OrderActionUnplan extends OrderActionUnplanStatic {
	
	
	public function __construct($id)
    {
        $this->tableName = 'order_action_unplan';
        parent::__construct($id);
    }
	
}























