<?php

trait OrderActionTimeAverage {

	public function setTimeAverage()
	{
		$this->timeAverage = $this->getTimeAverage($this);
		if ($this->timeAverage && $this->timeAverage > Date::HOUR_MINUTES) $this->timeAverageDivision = Date::convertMinutesToHours($this->timeAverage);
		return $this;
	}

	private function getTimeAverage($action)
	{
		$action->getProduct();
		if (!$action->product || !$action->product->symbol) return;
		$actions_same = $this->getSameActions($action);
		if (!$actions_same) return;
		return $this->calculateTimeAverage($actions_same);
	}

	private function getSameActions($action)
	{
		$products = (new OrderProduct)->getAllBySymbolModel($action->product->symbol);
		if (!$products) return;
		$actions_same = [];
		foreach ($products as $product) {
			$product = (new OrderProduct)->setData($product)->getActions();
			if (!$product->actions) continue;
			$same = $this->selectProperty($product->actions, 'name', $action->name);
			if (is_array($same)) $actions_same = array_merge($actions_same, $same);
		}
		return $actions_same;
	}

	private function calculateTimeAverage($actions)
	{
		$times = [];
		foreach ($actions as $action)
		{
			$action->setTimeFact();
			if (!$action->timeFact) continue;
			$times[] = ($action->qty > 1) ? ceil($action->timeFact / $action->qty) : $action->timeFact;
		}
		if ($times) return ceil(array_sum($times) / count($times));
	}
	
}