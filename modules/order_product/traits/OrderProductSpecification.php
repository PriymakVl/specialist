<?php

trait OrderProductSpecification {
	
	public function getSpecification()
	{
		$items = $this->getByIdParent();
		if (!$items) return $this;
		$methods = ['setData', 'getOptions', 'setTypeProduct'];
		$this->specification = ObjectHelper::createArray($items, 'OrderProduct', $methods);
		$this->specificationGroup = (new Product)->getSpecificationGroup($this->specification);
		return $this;
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
			$qty = $product->qty * $this->qty;
			$params = ['qty' => $qty, 'id_parent' => $id_parent, 'id_prod' => $product->id, 'id_order' => $this->id_order, 'state' => self::STATE_WAITING];
			$id_sub_parent = $this->addOne($params);
			if ($product->specification) $this->addSpecificationRecursive($product->specification, $id_sub_parent);
		}
		return $this;
	}
	
	/** delete specification **/
		
	public function deleteSpecification()
	{
		if (!$this->specification) return $this;
		foreach ($this->specification as $product) {
			$product->getSpecification();
			if ($product->specification) $product->deleteSpecification();
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