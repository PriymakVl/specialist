<?php
require_once('specification_base.php');

class SpecificationStatic extends SpecificationBase {
    
    public static function getAllForProduct($id_prod)
    {
        $sql = 'SELECT `id` FROM `specifications` WHERE `id_prod` = :id_prod AND `status` = :status';
        $params = ['id_prod' => $id_prod, 'status' => self::STATUS_ACTIVE];
        $ids = self::perform($sql, $params)->fetchAll();
        return self::createArrayOfSpecification($ids);
    }

    private static function createArrayOfSpecification($ids)
    {
        return Helper::createArrayOfObject($ids, 'Specification');
    }

    public static function getParentProduct($id_specif)
    {
        $sql = 'SELECT `id_prod` FROM `specifications` WHERE `id` = :id';
        $params = ['id' => $id_specif];
        $id_prod = self::perform($sql, $params)->fetchColumn();
		$product = new Product($id_prod);
		$product->idSpecifActive = $id_specif;
        return $product;
    }


}