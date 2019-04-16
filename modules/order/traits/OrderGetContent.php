<?php

trait OrderGetContent {

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
	
	public function getMainProducts()
	{
		$this->productsMain = (new OrderProduct)->getMainParentOrder($this->id);
		return $this;
	}
	
	public function getAllProductsNotStateEnded()
	{
		$this->productsNotReady = (new OrderProduct)->getAllForOrderNotStateEnded();
		return $this;
	}
}