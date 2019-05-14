<?php

trait WorkerConvert {

	
	public function getCurrentActionsString()
	{
		if (!$this->currentActions) return;
		foreach ($this->currentActions as $action) {
			$this->currentActionsString[] = $this->convertActionToString($action);
		}
		return $this;
	}
	
	private function convertActionToString($action)
	{
		$product_symbol = $action->id_prod ? $action->product->symbol: '';
		return $product_symbol.' <span class="green">'.$action->name.'</span>';
	}
	
	public function getFirstActionPlanString()
	{
		if (!$this->actions) return;
		$this->firstActionPlanString = $this->convertActionToString($this->actions[0]);
		return $this;
	}
}