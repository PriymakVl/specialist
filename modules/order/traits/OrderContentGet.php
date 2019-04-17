<?php

trait OrderContentGet {

	public function getPositions()
	{
		$this->positions = (new OrderPosition)->getAllByIdOrderModel($this->id);
		return $this;
	}
	
	public function getActions()
	{
		$this->actions = (new OrderAction)->getForOrder();
		return $this;
	}
	
	public function getProductsMain()
	{
		$this->productsMain = (new OrderProduct)->getMainForOrder();
		return $this;
	}
	
	public function getProductsAll()
	{
		$this->productsAll = (new OrderProduct)->getAllForOrder();
		return $this;
	}
}