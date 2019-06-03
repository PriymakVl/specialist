<?php

class OrderProduct extends OrderProductBase {
	
	use OrderProductEdit, OrderProductSelectItems, OrderProductGet, OrderProductConvert, OrderProductSpecification, OrderProductState;
	use OrderProductAdd, OrderProductModel, OrderProductDateReady, OrderProductTime;
	
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
		$this->actions = (new OrderAction)->getForProduct($this->id);
		return $this;
	}
	//with specification product
	public function getActionsAll()
	{
		$this->actionsAll = $this->actions;
		$this->getSpecificationAll();
		if (!$this->specificationAll) return $this;
		foreach ($this->specificationAll as $product) {
			$product->getActions();
			if ($product->actions) $this->actionsAll = array_merge($this->actionsAll, $product->actions);
		}
		return $this;
	}

	
}























