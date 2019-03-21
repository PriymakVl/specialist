<?php
require_once('order_base.php');

class OrderModel extends OrderBase {

	public static function getStateAll($params)
	{
		unset($params['state']);
		$sql = 'SELECT `id` FROM `orders` WHERE `status` = :status ORDER BY rating DESC, date_exec ASC';
		return self::perform($sql, $params)->fetchAll();	
	}
	
	public static function getStateOne()
	{
		$params = self::selectParams(['state', 'status']);
		debug($params);
		$sql = 'SELECT `id` FROM `orders` WHERE `state` = :state AND `status` = :status ORDER BY rating DESC, date_exec ASC';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public static function getBySymbol($symbol)
	{
	   if (empty($symbol)) return false;
	   $sql = 'SELECT * FROM `orders` WHERE `symbol` = :symbol AND `status` = :status';
	   $params = ['symbol' => $symbol, 'status' => self::STATUS_ACTIVE];
	   return self::perform($sql, $params)->fetch();
	}

    public static function add($params)
    {
		unset($params['save']);
        $fields = 'symbol, note, date_exec, type, state, rating, date_reg';
        $values = ':symbol, :note, :date_exec, :type, :state, :rating, :date_reg';
        $sql = 'INSERT INTO `orders` ('.$fields.') VALUES ('.$values.')';
		return self::insert($sql, $params);
    }
	
	public static function editModel($params)
	{
		unset($params['save']);
		$sql = 'UPDATE `orders` SET `symbol` = :symbol, `date_exec` = :date_exec, `type` = :type, `note` = :note, `rating` = :rating, `state` = :state
		WHERE `id` = :id_order';
		return self::update($sql, $params);
	}

    public static function searchBySymbol($symbol)
    {
        $sql = 'SELECT * FROM `orders` WHERE `symbol` like concat("%", :symbol, "%") AND `status` = :status';
        $params = ['symbol' => $symbol, 'status' => self::STATUS_ACTIVE];
        return self::perform($sql, $params)->fetchAll();
    }
	
	public static function setState($params)
	{
		$sql = 'UPDATE `orders` SET `state` = :state WHERE `id` = :id_order';
		return self::update($sql, $params);
	}
    
}























