<?php
require_once('order_action_unplan_static.php');

class OrderActionUnplan extends OrderActionUnplanStatic {
	
	
	public function __construct($id)
    {
        $this->tableName = 'order_action_unplan';
        parent::__construct($id);
		$this->message->section = 'order_action_unplan';
    }
	
	public function startWork($params)
	{
		OrderActionState::add($params);
		self::setStateStartWork($params);
		return $this;
	}
	
	public function stopWork($params)
	{
		OrderActionState::add($params);
		self::setStateStopWork($params);
		return $this;
	}
	
	public function endWork($params)
	{
		OrderActionState::add($params);
		self::setStateEndWork($params);
		return $this;
	}
	
	public function edit($params)
	{
		self::updateById($params);
		OrderActionState::add($params);
		return $this;
	}
	
}























