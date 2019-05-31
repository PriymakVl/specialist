<?php

trait ProductTime {
	
	use ProductTimeDetail;

	public function calculateTimePlan()
	{
		$this->setTimePlanDetail();
		$this->timePlanSpecification = $this->calculateTimePlanSpecification();
		if ($this->timePlanSpecification) $this->setTimeUnit();
		return $this;
	}

	private function setTimePlanDetail()
	{
		$this->timePlanDetailOne = $this->calculateTimePlanDetail(false);
		if ($this->timePlanDetailOne && $this->timePlanDetailOne > Date::HOUR_MINUTES) $this->timePlanDetailOneDivision = Date::convertMinutesToHours($this->timePlanDetailOne);
		if ($this->qty > 1) $this->timePlanDetailAll = $this->calculateTimePlanDetail(); //time preparation used once 
		if ($this->timePlanDetailAll && $this->timePlanDetailAll > Date::HOUR_MINUTES) $this->timePlanDetailAllDivision = Date::convertMinutesToHours($this->timePlanDetailAll);
	}

	private function setTimePlanUnit()
	{
		$this->timePlanUnitOne = $this->timePlanDetailOne + $this->timePlanSpecification;
		if ($this->timePlanUnitOne && $this->timePlanUnitOne > Date::HOUR_MINUTES) $this->timePlanUnitOneDivision = Date::convertMinutesToHours($this->timePlanUnitOne);
		$this->timePlanUnitAll = $this->timePlanDetailAll + $this->timePlanSpecification;
		if ($this->timePlanUnitAll && $this->timePlanUnitAll > Date::HOUR_MINUTES) $this->timePlanUnitAllDivision = Date::convertMinutesToHours($this->timePlanUnitAll);
	}
	
	private function calculateTimePlanSpecification()
	{
		$timePlanSpecification = 0;
		$this->getSpecificationAll();
		if (!$this->specificationAll) return;
		foreach ($this->specificationAll as $product) {
			$product->getActions()->calculateTimePlanDetail();
			$timePlanSpecification += $product->timePlanDetailAll ? $product->timePlanDetailAll : $product->timePlanDetailOne;
		}
		return $timePlanSpecification;
	}

}