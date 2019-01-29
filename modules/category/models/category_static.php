<?php
require_once('category_base.php');

class CategoryStatic extends CategoryBase {

	public static function getList($params)
	{
	    $where = self::bildWhere($params);
	    $sql = 'SELECT `id` FROM `categories` '.$where;
        $ids = self::perform($sql, $params)->fetchAll();
	    return self::createArrayOfCategory($ids);
	}

    public static function getPrimary()
    {
        $sql = 'SELECT `id` FROM `categories` WHERE `id_parent` = :id_parent AND `status` = :status';
        $params = ['id_parent' => self::ID_PRIMARY, 'status' => self::STATUS_ACTIVE];
        $ids = self::perform($sql, $params)->fetchAll();
        return self::createArrayOfCategory($ids);
    }

	private static function createArrayOfCategory($ids)
    {
        return Helper::createArrayOfObject($ids, 'Category');
    }

//    public static function add($params)
//    {
//        $fields = 'number, date_exec, count_pack, letter, type, state, note, date_state';
//        $values = ':number, :date_exec, :count_pack, :letter, :type, :state, :note, :date_state';
//        $sql = 'INSERT INTO orders ('.$fields.') VALUES ('.$values.')';
//        self::perform($sql, $params);
//        $order_id = parent::getLastId();
//        OrderState::set($order_id, OrderState::PREPARATION);
//        return $order_id;
//    }

    
	
}























