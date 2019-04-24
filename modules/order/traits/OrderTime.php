<?php

trait OrderTime {
	
	use OrderDateReady;

	public function countTimeManufacturingOrder()
	{
		if (!$this->time_prod) return $this;
		$this->timeManufacturingOrder = ProductTime::manufacturingOrder($this);
		return $this;
	}
	
	public function manufacturingOrder($product)
	{
		$time_prepar = $product->time_prepar ? $product->time_prepar : 0;
		return ($product->orderQtyAll * $product->time_prod) + $time_prepar;
	}
	
}