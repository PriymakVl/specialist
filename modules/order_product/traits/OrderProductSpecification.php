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
	
	public function addSpecification()
	{
		$prod_base = (new Product)->getData($this->get->id_prod)->getSpecification();
		if (!$prod_base->specification) return $this;
		$this->addSpecificationRecursive($prod_base->specification, $this->id_order);
		return $this;
	}
	
	public function addSpecificationRecursive($specification)
	{
		foreach ($specification as $product) {
			//$product->getSpecification();
			//if ($product->specification) $this->addSpecificationRecursive($product->specification);
			$qty = $product->qty * $this->qty;
			$params = ['qty' => $qty, 'id_parent' => $this->id, 'id_prod' => $product->id, 'id_order' => $this->id_order, 'state' => self::STATE_WAITING];
			$this->addOne($params);
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