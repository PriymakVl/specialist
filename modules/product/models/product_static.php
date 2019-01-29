<?php
require_once('product_base.php');

class ProductStatic extends ProductBase {


    public static function getAllByIdCategory($id_cat)
    {
        $sql = 'SELECT `id` FROM `products` WHERE `id_cat` = :id_cat AND `status` = :status';
        $params = ['id_cat' => $id_cat, 'status' => self::STATUS_ACTIVE];
        $ids = self::perform($sql, $params)->fetchAll();
        return self::createArrayOfProduct($ids);
    }

    private static function createArrayOfProduct($ids)
    {
        return Helper::createArrayOfObject($ids, 'Product');
    }
}