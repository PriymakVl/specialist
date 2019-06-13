<?php

trait ProductSpecification  {

	public function getSpecification()
	{
		$items = $this->getByIdParentModel();
		if (!$items) return $this;
		$methods = ['setData', 'getActions'];
		//if ($this->id != ID_CATEGORY_CYLINDER && $this->id != ID_CATEGORY_PRESS && $this->id != ID_CATEGORY_PRODUCTS) 
		if ($this->type != self::TYPE_CATEGORY) $methods = array_merge($methods, ['calculateTimePlan', 'getDrawings']);
		$this->specification = ObjectHelper::createArray($items, 'Product', $methods);
		$this->specificationGroup = $this->getSpecificationGroup($this->specification);
		return $this;
	}
	
	//чтобы показывать в виде категории
	public function getSpecificationChildren()
	{
		if ($this->id == ID_CATEGORY_PRODUCTS || $this->id == ID_CATEGORY_CYLINDER || $this->id == ID_CATEGORY_PRESS) {
			foreach ($this->specification as $item) {
				$item->specification = $item->getByIdParentModel();
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
	
	public function getSpecificationAll()
	{
		$this->specificationAll = $this->getByIdParentModel();
		if ($this->specificationAll) {
			$this->getSpecificationRecursive($this->specificationAll);
			$this->specificationAll = ObjectHelper::createArray($this->specificationAll, 'Product', ['setData']);
		}
		return $this;
	}
	
	public function getSpecificationRecursive($products)
	{
		foreach ($products as $product) {
			$items = $this->getByIdParentModel($product->id);
			if (!$items) continue;
			$this->specificationAll = array_merge($this->specificationAll, $items);
			$this->getSpecificationRecursive($items);
		}
	}
	
	


	
}