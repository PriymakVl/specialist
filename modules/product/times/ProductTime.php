<?php

trait ProductTime {
	
	use ProductTimeProduct;

	public function calculateTimePlan()
	{
		$this->timePlanProduct = $this->calculateTimePlanProduct(false);
		$this->timePlanSpecification = $this->calculateTimePlanSpecification();
		if ($this->timePlanSpecification) $this->timePlanUnit = $this->timePlanProduct + $this->timePlanSpecification;
		return $this;
	}
	
	private function calculateTimePlanSpecification()
	{
		$timePlanSpecification = 0;
		$this->getSpecificationAll();
		if (!$this->specificationAll) return;
		foreach ($this->specificationAll as $product) {
			$product->getActions()->calculateTimePlanProduct();
			$timePlanSpecification += $product->timePlanProduct;
		}
		return $timePlanSpecification;
	}

}