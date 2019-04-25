<?php

trait ProductTimeTotal {
	
	use ProductTimeItem;

	public function countTimeManufacturing()
	{
		$this->countTimeManufacturingItem();
		$this->countTimeManufacturingSpecification();
		if ($this->timeManufacturingSpecification) $this->timeManufacturingUnit = $this->timeManufacturingItem + $this->timeManufacturingSpecification;
		return $this;
	}
	
	private function countTimeManufacturingSpecification()
	{
		$this->getSpecificationAll();
		if (!$this->specificationAll) return;
		foreach ($this->specificationAll as $product) {
			$product->getActions()->countTimeManufacturingItem();
			$this->timeManufacturingSpecification += $product->timeManufacturingItem;
		}
		return $this;
	}

}