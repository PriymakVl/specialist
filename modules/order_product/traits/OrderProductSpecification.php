<?php

trait OrderProductSpecification {
	
	public function getSpecification()
	{
		$items = $this->getByIdParent();
		if (!$items) return $this;
		$this->specification = ObjectHelper::createArray($items, 'OrderProduct', ['setData']);
		$this->specificationGroup = (new Product)->getSpecificationGroup($this->specification);
		return $this;
	}
	
	public function getSpecificationAll()
	{
		$this->specificationAll = $this->getByIdParent();
		if ($this->specificationAll) {;
			$this->getSpecificationRecursive($this->specificationAll);
			$this->specificationAll = ObjectHelper::createArray($this->specificationAll, 'OrderProduct', ['setData']);
		}
		return $this;
	}
	
	public function getSpecificationRecursive($products)
	{
		foreach ($products as $product) {
			$items= $this->getByIdParent($product->id);
			if (!$items) continue;
			$this->specificationAll = array_merge($this->specificationAll, $items);
			$this->getSpecificationRecursive($items);
		}
	}
	
	
	/** add specification **/
	
	public function addSpecification($id_prod = false)
	{
		$id_prod = $id_prod ? $id_prod : $this->get->id_prod;
		$product = (new Product)->setData($id_prod)->getSpecification();//from base product
		if (!$product->specification) return $this;
		$this->addSpecificationRecursive($product->specification, $this->id);
		return $this;
	}
	
	public function addSpecificationRecursive($specification, $id_parent)
	{
		foreach ($specification as $product) {
			$product->getSpecification();
			$id_sub_parent = $this->addDataModel($product, $id_parent);
			if ($product->specification) $this->addSpecificationRecursive($product->specification, $id_sub_parent);
		}
		return $this;
	}
	
	/** delete specification **/
		
	public function deleteSpecificationAll()
	{
		if (!$this->specificationAll) return $this;
		foreach ($this->specificationAll as $product) {
			$product->delete();
		}
		return $this;
	}
	
	public function getSpecificationGroup()
	{
		if (!$this->specification) return $this;
		$this->specificationGroup = self::getSpecificationGroupTrait($this->specification);
		return $this;
	}
	


}