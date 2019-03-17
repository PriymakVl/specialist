<?php
require_once('product_base.php');

class ProductModel extends ProductBase {


    public static function getAllByIdParent($id_parent)
    {
        $sql = 'SELECT `id` FROM `products` WHERE `id_parent` = :id_parent AND `status` = :status ORDER BY `number`';
        $params = ['id_parent' => $id_parent, 'status' => self::STATUS_ACTIVE];
        return self::perform($sql, $params)->fetchAll();
    }
	
	public static function add($params)
	{
		unset($params['save']);
		$fields = 'symbol, name, quantity, type, id_parent, note, number';
        $values = ':symbol, :name, :quantity, :type, :id_parent, :note, :number';
        $sql = 'INSERT INTO `products` ('.$fields.') VALUES ('.$values.')';
        return self::insert($sql, $params); 
	}
	
	public static function editOne($params) 
	{
		unset($params['save'], $params['symbol_old']);
		$sql = 'UPDATE `products` SET `symbol` = :symbol, `name` = :name, `type` = :type, `note` = :note, `id_parent` = :id_parent, 
				`quantity` = :quantity, `number` = :number WHERE `id` = :id';
		return self::update($sql, $params);
	}
	
	public static function editAll($params)
	{
		unset($params['edit_all'], $params['quantity'], $params['id_parent'], $params['save'], $params['id']);
		$sql = 'UPDATE `products` SET `symbol` = :symbol, `name` = :name, `type` = :type, `note` = :note WHERE `symbol` = :symbol_old';
		return self::update($sql, $params);
	}
	
	public static function getAllBySymbol($symbol)
	{
		$sql = 'SELECT * FROM `products` WHERE `symbol` = :symbol AND `status` = :status';
        $params = ['symbol' => $symbol, 'status' => self::STATUS_ACTIVE];
        return self::perform($sql, $params)->fetchAll();
	}
	
}