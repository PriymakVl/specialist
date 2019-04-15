<?php

class OrderProduct extends OrderProductBase {
	
	use OrderProductTotal, OrderProductConvert, OrderProductSpecification, OrderProductState, OrderProductAdd;
	
	public function edit()
	{
		$this->editModel();
		return $this;
	}
	
	public function getParent()
	{
		if ($this->id_parent) $this->parent = (new self)->setData($this->id_parent); 
		return $this;
	}
	
	public function getOrder()
	{
		$this->order = (new Order)->getData($this->id_order);
		return $this;
	}
	
	public function deleteAll()
	{
		$this->getSpecificationAll()->deleteSpecificationAll()->delete();
		$products = $this->specificationAll ? array_merge([$this], $this->specificationAll) : [$this];
		(new OrderAction)->deleteFromProducts($products);
		return $this;
	}
	
	public function getActions()
	{
		$this->actions = (new OrderAction)->getForProduct($this);
		return $this;
	}
	
	public function editRating()
	{
		$this->setRating($this->get->rating);
		(new OrderAction)->editRatingForProduct($this);
		return $this;
	}
	
	
	
	
	
	
	
	
}























