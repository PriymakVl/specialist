<?php

class OrderProduct extends OrderProductBase {
	
	use OrderProductTotal, OrderProductConvert, OrderProductSpecification, OrderProductState, OrderProductAdd;
	
	public function __construct($id = false)
	{
		$this->tableName = 'order_products';
		parent::__construct($id);
		$this->message->section = 'order_product';
	}
	
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
		(new OrderActions)->editRatingForProduct($this);
		return $this;
	}
	
	
	
	
	
	
	
	
}























