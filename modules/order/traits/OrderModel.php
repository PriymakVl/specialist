<?php

trait OrderModel {
	
	use OrderParam;

	public static function getStateAll()
	{
		$sql = 'SELECT * FROM `orders` WHERE `status` = :status ORDER BY rating DESC, date_exec ASC';
		return self::perform($sql, ['status' => STATUS_ACTIVE])->fetchAll();	
	}
	
	public static function getStateOne($state)
	{
		$params = ['status' => STATUS_ACTIVE, 'state' => $state];
		$sql = 'SELECT * FROM `orders` WHERE `state` = :state AND `status` = :status ORDER BY rating DESC, date_exec ASC';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public static function getBySymbol($symbol)
	{
	   if (empty($symbol)) return false;
	   $sql = 'SELECT * FROM `orders` WHERE `symbol` = :symbol AND `status` = :status';
	   $params = ['symbol' => $symbol, 'status' => STATUS_ACTIVE];
	   return self::perform($sql, $params)->fetch();
	}

    public static function addDataModel()
    {
		$params = self::addDataParam(['symbol', 'note', 'date_exec', 'type', 'state', 'rating']);
        $fields = 'symbol, note, date_exec, type, state, rating, date_reg';
        $values = ':symbol, :note, :date_exec, :type, :state, :rating, :date_reg';
        $sql = 'INSERT INTO `orders` ('.$fields.') VALUES ('.$values.')';
		return self::insert($sql, $params);
    }
	
	public static function editModel($params)
	{
		$params = self::editModelParam();
		$sql = 'UPDATE `orders` SET `symbol` = :symbol, `date_exec` = :date_exec, `type` = :type, `note` = :note, `rating` = :rating, `state` = :state
		WHERE `id` = :id_order';
		return self::update($sql, $params);
	}

    public static function searchBySymbol($symbol)
    {
        $sql = 'SELECT * FROM `orders` WHERE `symbol` like concat("%", :symbol, "%") AND `status` = :status';
        $params = ['symbol' => $symbol, 'status' => STATUS_ACTIVE];
        return self::perform($sql, $params)->fetchAll();
    }
	
	public static function setStateModel($params)
	{
		$sql = 'UPDATE `orders` SET `state` = :state WHERE `id` = :id_order';
		return self::update($sql, $params);
	}
    
}























