<?php

trait ProductStatic  {

	use ProductModel;

    public static function getSpecificationStatic($id_parent)
    {
		$items = self::getAllByIdParent($id_parent);
		if ($items) return ObjectHelper::createArray($items, 'Product', ['setData']); 
			//->countTimeManufacturing()->getActions();
    }
	
	public static function getSpecificationGroupStatic($specification)
	{
		$specification_group = [];
		foreach ($specification as $item) {
			if($item->type == self::TYPE_CATEGORY) $specification_group['category'][] = $item;
			else if($item->type == self::TYPE_PRODUCT) $specification_group['product'][] = $item;
			else if($item->type == self::TYPE_UNIT) $specification_group['unit'][] = $item;
			else if ($item->type == self::TYPE_DETAIL)  $specification_group['detail'][] = $item;
			else if ($item->type == self::TYPE_STANDARD)  $specification_group['standard'][] = $item;
			else if ($item->type == self::TYPE_OTHER)  $specification_group['other'][] = $item;
		}
		return $specification_group;
	}
	
	protected static function getSpecificationChildrenStatic($specification)
	{
		foreach ($specification as $item) {
			$item->getSpecification($item->id)->getSpecificationGroup();
		}
	}
	
	protected static function deleteSpecification($specification)
	{
		throw new Exception('Method deleteSpecification do not write');
	}
	


	
}