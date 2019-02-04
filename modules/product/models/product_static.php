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
}