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
			$product->getSpecification();
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
	
	public static function edit($params, $product)
	{	
		$sql = 'UPDATE `products` SET `symbol` = :symbol, `name` = :name, `type` = :type, `note` = :note, `id_parent` = :id_parent ';
		if ($product->symbol && $params['symbol'] == $params['symbol_old']) {
			$where = 'WHERE `symbol` = :symbol_old AND `status` = :status';
			$params['symbol_old'] = $product->symbol;
		}
		else {
			$where = 'WHERE `id` = :id_prod AND `status` =:status';	
			$params['id_prod'] = $product->id;
		}
		$sql = $sql.$where;
		return self::update($sql, $params);
	}
	
}