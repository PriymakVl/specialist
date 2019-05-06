<?php

trait WorkerConvert {

	public function convertTimePlanToHours()
	{
		$hour_minutes = 60;
		if ($this->timePlan && $this->timePlan > $hour_minutes) $this->timePlanHour = Date::convertMinutesToHours($this->timePlan);
		return $this;
	}
	
	public function getCurrentActionsString()
	{
		if (!$this->currentActions) return;
		foreach ($this->currentActions as $action) {
			$order = $action->id_order ? 'заказ: '.$action->order->symbol : '';
			$product = $action->id_prod ? $action->product->symbol: '';
			$this->currentActionsString .= $order.' '.$product.' <span class="green">'.$action->name.'</span><br>';
		}
	}
}