<?php

trait ProductTimeTotal {
	
	use ProductTimeItem;

	public function calculateTimePlan()
	{
		$this->timePlanProduct = $this->calculateTimePlanProduct();
		$this->timePlanSpecification = $this->calculateTimeSpecification();
		if ($this->timePlanSpecification) $this->timePlan = $this->timePlanProduct + $this->timePlanSpecification;
		return $this;
	}
	
	private function calculateTimePlanSpecification()
	{
		$this->getSpecificationAll();
		if (!$this->specificationAll) return;
		foreach ($this->specificationAll as $product) {
			$product->getActions()->countTimePlanProduct();
			$timePlanSpecification += $product->timePlanProduct;
		}
		return $timePlanSpecification;
	}

}