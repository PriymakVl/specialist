<?php
require_once('order_base.php');

class OrderStatic extends OrderBase {

//    public static function getByNumber($number)
//    {
//        if (empty($number)) return false;
//        $sql = 'SELECT * FROM `orders` WHERE `number` = ? AND `status` = '.parent::STATUS_ACTIVE;
//        return self::perform($sql, [$number])->fetch();
//    }

	public static function getList($params)
	{
	    $where = self::bildWhere($params);
	    $sql = 'SELECT `id` FROM `orders` '.$where.' ORDER BY date_exec';
        $ids = self::perform($sql, $params)->fetchAll();
	    return self::createArrayOfOrder($ids);
	}

	private static function createArrayOfOrder($ids)
    {
        return Helper::createArrayOfObject($ids, 'Order');
    }

    public static function add($params)
    {
        $fields = 'number, date_exec, count_pack, letter, type, state, note, date_state';
        $values = ':number, :date_exec, :count_pack, :letter, :type, :state, :note, :date_state';
        $sql = 'INSERT INTO orders ('.$fields.') VALUES ('.$values.')';
        self::perform($sql, $params);
        $order_id = parent::getLastId();
        OrderState::set($order_id, OrderState::PREPARATION);
        return $order_id;
    }

    public static function searchByNumber($number)
    {
        $sql = 'SELECT * FROM `orders` WHERE `number` like concat("%", :number, "%") AND `status` = '.self::STATUS_ACTIVE;
        return self::perform($sql, ['number' => $number])->fetchAll();
    }
    
	
}























