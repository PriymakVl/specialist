<?php
require_once('specification_base.php');

class SpecificationContent extends SpecificationBase {
    
    public static function getAllByIdSpecification($id_specif)
    {
        $sql = 'SELECT `id_prod`, `quantity` FROM `specification_content` WHERE `id_specif` = :id_specif AND `status` = :status';
        $params = ['id_specif' => $id_specif, 'status' => self::STATUS_ACTIVE];
        $items = self::perform($sql, $params)->fetchAll();
        return self::createArrayOfProducts($items);
    }

    private static function createArrayOfProducts($items)
    {
        $products = [];
        if (empty($items)) return $products;
        foreach ($items as $item) {
            $product = new Product($item->id_prod);
			$product->specifQty = $item->quantity;
			$products[] = $product;
        }
        return $products;
    }

    public static function add($id_specif, $id_prod)
    {
        $params = ['id_specif' => $id_specif, 'id_prod' => $id_prod];
        $sql = "INSERT INTO `specification_content` (id_specif, id_prod) VALUES (:id_specif, :id_prod)";
        return self::perform($sql, $params);
    }

}