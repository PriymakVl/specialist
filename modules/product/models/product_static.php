<?php
require_once('product_base.php');

class ProductStatic extends ProductBase {


    public static function getAllByIdParent($id_parent)
    {
        $sql = 'SELECT `id` FROM `products` WHERE `id_parent` = :id_parent AND `status` = :status';
        $params = ['id_parent' => $id_parent, 'status' => self::STATUS_ACTIVE];
        $ids = self::perform($sql, $params)->fetchAll();
        return self::createArrayOfProduct($ids);
    }

    private static function createArrayOfProduct($ids)
    {
        $products = Helper::createArrayOfObject($ids, 'Product');
		foreach ($products as $product) {
			$product->getSpecification()->countTimeManufacturing();
		}
		return $products;
    }
	
	public static function add($params)
	{
		$fields = 'symbol, name, quantity, type, id_parent, note';
        $values = ':symbol, :name, :quantity, :type, :id_parent, :note';
        $sql = 'INSERT INTO `products` ('.$fields.') VALUES ('.$values.')';
        return self::insert($sql, $params); 
	}
	
	public static function editOne($params) 
	{
		unset($params['save'], $params['symbol_old']);
		$sql = 'UPDATE `products` SET `symbol` = :symbol, `name` = :name, `type` = :type, `note` = :note, `id_parent` = :id_parent, 
				`quantity` = :quantity WHERE `id` = :id';
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