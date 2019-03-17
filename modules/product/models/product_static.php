<?php
require_once('product_model.php');

class ProductStatic extends ProductModel {


    public static function getSpecificationStatic($id_parent)
    {
		$ids = self::getAllByIdParent($id_parent);
		if (empty($ids)) return false;
        $products = Helper::createArrayOfObject($ids, 'Product');
		foreach ($products as $product) {
			$product->countTimeActions();
		}
		return $products;
    }
	
	public static function getSpecificationGroupStatic($specification)
	{
		foreach ($specification as $item) {
			if($item->type == self::TYPE_PRODUCT) $specification_group['product'][] = $item;
			else if($item->type == self::TYPE_UNIT) $specification_group['unit'][] = $item;
			else if ($item->type == self::TYPE_DETAIL)  $specification_group['detail'][] = $item;
			else if ($item->type == self::TYPE_STANDARD)  $specification_group['standard'][] = $item;
			else if ($item->type == self::TYPE_OTHER)  $specification_group['other'][] = $item;
		}
		return $specification_group;
	}
	


	
}