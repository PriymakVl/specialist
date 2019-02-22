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
		$fields = 'symbol, name, quantity, type, id_parent, note, time_prod, time_prepar';
        $values = ':symbol, :name, :quantity, :type, :id_parent, :note, :time_prod, :time_prepar';
        $sql = 'INSERT INTO `products` ('.$fields.') VALUES ('.$values.')';
        return self::insert($sql, $params); 
	}
	
	public static function edit($params, $product)
	{
		if (empty($params['edit_all'])) {
			$sql = 'UPDATE `products` SET `symbol` = :symbol, `name` = :name, `type` = :type, `note` = :note, `id_parent` = :id_parent, 
				`quantity` = :quantity, `time_prod` = :time_prod, `time_prepar` = :time_prepar WHERE `id` = :id_prod';
			$params['id_prod'] = $product->id;
		}
		else {
			$sql = 'UPDATE `products` SET `symbol` = :symbol, `name` = :name, `type` = :type, `note` = :note, `time_prod` = :time_prod, 
				`time_prepar` = :time_prepar WHERE `symbol` = :symbol_old';
			unset($params['edit_all'], $params['quantity'], $params['id_parent']);
			$params['symbol_old'] = $product->symbol;
		}
		return self::update($sql, $params);
	}
	
		public static function getAllBySymbol($symbol)
	{
		$sql = 'SELECT * FROM `products` WHERE `symbol` = :symbol AND `status` = :status';
        $params = ['symbol' => $symbol, 'status' => self::STATUS_ACTIVE];
        return self::perform($sql, $params)->fetchAll();
	}
	
}