<?php

trait ProductActionList
{
	public function copy()
	{
		$actions = $this->getAllBySymbolProductModel($this->get->symbol);
		if (!$actions) return $this;
		foreach ($actions as $action) {
			$params = $this->getParamsForCopy($action);
			$this->addDataModel($params);
		}
		return $this;
	}
}