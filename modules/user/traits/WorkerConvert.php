<?php

trait WorkerConvert {

	
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