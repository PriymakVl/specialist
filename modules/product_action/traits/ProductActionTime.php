<?php

trait ProductActionTime {
	
	public function setTimeAverage()
	{
		$product = (new OrderProduct)->getAllBySymbolModel($this->symbol)[0];
		$product = (new OrderProduct)->setData($product)->getActions()->calculateTimeActions();
		foreach ($product->actions as $action) {
			if ($this->name == $action->name && $this->note == $action->note) {
				$this->timeAverage = $action->timeAverage;
				// $this->timeAverageDevision = $action->timeAverageDevision;
			}
		}
	}
}