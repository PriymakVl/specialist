<?php

trait OrderModelStateAndType {

	
	public function getByStateAndTypeModel()
	{
		$params = ['status' => STATUS_ACTIVE, 'type' => $this->get->type, 'state' => $this->get->state];
		$sql = 'SELECT * FROM `orders` WHERE `type` = :type AND `state` = :state AND `status` = :status ORDER BY rating DESC, date_exec ASC';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public function getByTypeModel()
	{
		$params = ['status' => STATUS_ACTIVE, 'type' => $this->get->type];
		$sql = 'SELECT * FROM `orders` WHERE `type` = :type AND `status` = :status ORDER BY rating DESC, date_exec ASC';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public function getByStateModel()
	{
		$params = ['status' => STATUS_ACTIVE, 'state' => $this->get->state];
		$sql = 'SELECT * FROM `orders` WHERE `state` = :state AND `status` = :status ORDER BY rating DESC, date_exec ASC';
		return self::perform($sql, $params)->fetchAll();
	}
	
	//2 state waiting and work
	public function getListForPlanModel()
	{
		$params = $this->getListForPlanParam();
		$sql = 'SELECT * FROM `orders` WHERE `type` = :type AND (`state` = :waiting OR `state` = :work) AND `status` = :status 
			ORDER BY state, rating DESC, date_exec ASC';
		return self::perform($sql, $params)->fetchAll();
	}


}