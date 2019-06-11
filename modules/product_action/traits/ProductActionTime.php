<?php

trait ProductActionTime {
	
	public function setTimeAverage()
	{
		$result = (new OrderProduct)->getAllBySymbolModel($this->symbol);
		if (!$result) return;
		$product = (new OrderProduct)->setData($result[0])->getActions()->calculateTimeActions();
		if (!$product->actions) return;
		foreach ($product->actions as $action) {
			if ($this->name == $action->name && $this->note == $action->note) {
				$this->timeAverage = $action->timeAverage;
				// $this->timeAverageDevision = $action->timeAverageDevision;
			}
		}
	}
}