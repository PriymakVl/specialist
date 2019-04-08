<?php

trait ProductSpecification  {

	public function getSpecification()
	{
		$items = $this->getAllByIdParent();
		if (!$items) return $this;
		$this->specification = ObjectHelper::createArray($items, 'Product', ['setData']); 
		//->countTimeManufacturing()->getActions();
		$this->specificationGroup = $this->getSpecificationGroup($this->specification);
		return $this;
	}
	
	//чтобы показывать в виде категории
	public function getSpecificationChildren()
	{
		if ($this->id == ID_CATEGORY_PRODUCTS || $this->id == ID_CATEGORY_CYLINDER || $this->id == ID_CATEGORY_PRESS) {
			foreach ($this->specification as $item) {
				$item->getSpecification();
			}
		}
		return $this;
	}
	
	public function getSpecificationGroup($specification)
	{
		$group = [];
		foreach ($specification as $item) {
			if($item->type == self::TYPE_CATEGORY) $group['category'][] = $item;
			else if($item->type == self::TYPE_PRODUCT) $group['product'][] = $item;
			else if($item->type == self::TYPE_UNIT) $group['unit'][] = $item;
			else if ($item->type == self::TYPE_DETAIL)  $group['detail'][] = $item;
			else if ($item->type == self::TYPE_STANDARD)  $group['standard'][] = $item;
			else if ($item->type == self::TYPE_OTHER)  $group['other'][] = $item;
		}
		return $group;
	}
	
	public function deleteSpecification()
	{
		foreach ($this->specification as $product) {
			$product->getSpecification();
			if ($product->specification) $this->deleteSpecification();
			$product->delete();
		}
		return $this;
	}
	
	


	
}