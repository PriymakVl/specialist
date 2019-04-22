<?php

trait OrderModelSelect {

	public function getAllOrdersModel()
	{
		$sql = 'SELECT * FROM `orders` WHERE `status` = :status ORDER BY state DESC, rating DESC, date_exec ASC';
		return self::perform($sql, ['status' => STATUS_ACTIVE])->fetchAll();
	}
	
	public function getByStateAndTypeModel($type, $state)
	{
		$params = ['state' => $state, 'type' => $type, 'status' => STATUS_ACTIVE];
		$sql = 'SELECT * FROM `orders` WHERE `type` = :type AND `state` = :state AND `status` = :status ORDER BY state DESC, rating DESC, date_exec ASC';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public function getByTypeModel($type)
	{
		$params = ['type' => $type, 'status' => STATUS_ACTIVE];
		$sql = 'SELECT * FROM `orders` WHERE `type` = :type AND `status` = :status ORDER BY state DESC, rating DESC, date_exec ASC';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public function getByStateModel($state)
	{
		$params = ['state' => $state, 'status' => STATUS_ACTIVE];
		$sql = 'SELECT * FROM `orders` WHERE `state` = :state AND `status` = :status ORDER BY rating DESC, date_exec ASC';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public function getBySymbol()
	{
	   if (!$this->post->symbol) return false;
	   $sql = 'SELECT * FROM `orders` WHERE `symbol` = :symbol AND `status` = :status';
	   $params = ['symbol' => trim($this->post->symbol), 'status' => STATUS_ACTIVE];
	   return self::perform($sql, $params)->fetch();
	}
	
	public function searchBySymbol()
    {
        $sql = 'SELECT * FROM `orders` WHERE `symbol` like concat("%", :symbol, "%") AND `status` = :status';
        $params = ['symbol' => trim($this->post->symbol), 'status' => STATUS_ACTIVE];
        return self::perform($sql, $params)->fetchAll();
    }
	
}