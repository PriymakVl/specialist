<?php
require_once('order_action_unplan_static.php');

class OrderActionUnplan extends OrderActionUnplanStatic {
	
	
	public function __construct($id)
    {
        $this->tableName = 'order_action_unplan';
        parent::__construct($id);
		$this->message->section = 'order_action_unplan';
    }

	public function editState($params)
	{
		OrderActionState::add($params);
		self::setState($params);
		return $this;
	}
	
	public function editTime($params)
	{
		if (empty($params['state'])) return $this;
		if ($params['state'] == OrderActionState::PROGRESS && !$this->time_start) self::setTimeStart($params);
		if ($params['state'] == OrderActionState::ENDED) self::setTimeEnd($params);
		return $this;
	}
	
	public function edit($params)
	{
		self::updateById($params);
		self::editTime($params);
		OrderActionState::add($params);
		return $this;
	}
	
}























