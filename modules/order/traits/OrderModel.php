<?php

trait OrderModel {
	
	use OrderParam;

	public function getStateAll()
	{
		$sql = 'SELECT * FROM `orders` WHERE `status` = :status ORDER BY rating DESC, date_exec ASC';
		return self::perform($sql, ['status' => STATUS_ACTIVE])->fetchAll();	
	}
	
	public function getStateOne($state)
	{
		$params = ['status' => STATUS_ACTIVE, 'state' => $state];
		$sql = 'SELECT * FROM `orders` WHERE `state` = :state AND `status` = :status ORDER BY rating DESC, date_exec ASC';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public function getBySymbol($symbol)
	{
	   if (empty($symbol)) return false;
	   $sql = 'SELECT * FROM `orders` WHERE `symbol` = :symbol AND `status` = :status';
	   $params = ['symbol' => $symbol, 'status' => STATUS_ACTIVE];
	   return self::perform($sql, $params)->fetch();
	}

    public function addDataModel()
    {
		$params = $this->addDataParam(['symbol', 'note', 'date_exec', 'type', 'state', 'rating']);
        $fields = 'symbol, note, date_exec, type, state, rating, date_reg';
        $values = ':symbol, :note, :date_exec, :type, :state, :rating, :date_reg';
        $sql = 'INSERT INTO `orders` ('.$fields.') VALUES ('.$values.')';
		return self::insert($sql, $params);
    }
	
	public function editData()
	{
		$params = $this->editDataParam();
		$sql = 'UPDATE `orders` SET `symbol` = :symbol, `date_exec` = :date_exec, `type` = :type, `note` = :note, `rating` = :rating WHERE `id` = :id_order';
		return self::update($sql, $params);
	}

    public function searchBySymbol()
    {
        $sql = 'SELECT * FROM `orders` WHERE `symbol` like concat("%", :symbol, "%") AND `status` = :status';
        $params = ['symbol' => trim($this->post->symbol), 'status' => STATUS_ACTIVE];
        return self::perform($sql, $params)->fetchAll();
    }
    
}























