<?php
require_once('order_base.php');

class OrderModel extends OrderBase {

	public static function getStateAll($params)
	{
		unset($params['state']);
		$sql = 'SELECT `id` FROM `orders` WHERE `status` = :status ORDER BY rating DESC, date_exec ASC';
		return self::perform($sql, $params)->fetchAll();	
	}
	
	public static function getStateOne($params)
	{
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
	
	public static function edit($params)
	{
		unset($params['save']);
		$sql = 'UPDATE `orders` SET `symbol` = :symbol, `date_exec` = :date_exec, `type` = :type, `note` = :note, `rating` = :rating
		WHERE `id` = :id_order';
		return self::update($sql, $params);
	}

    public static function searchBySymbol($symbol)
    {
        $sql = 'SELECT * FROM `orders` WHERE `symbol` like concat("%", :symbol, "%") AND `status` = :status';
        $params = ['symbol' => $symbol, 'status' => self::STATUS_ACTIVE];
        return self::perform($sql, $params)->fetchAll();
    }
    
}























