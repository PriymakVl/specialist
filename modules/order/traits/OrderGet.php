<?php

trait OrderGet {

	public function getForList()
	{
		$items = $this->getItems();
		if ($items) return ObjectHelper::createArray($items, 'Order', ['setData', 'getPositions', 'getPositionsTable']);
	}
	
	public function getForPlan()
	{
		$items = $this->getItemsForPlan();
		if ($items) return ObjectHelper::createArray($items, 'Order', ['setData', 'getMainProducts', 'getProductsTable', 'convertProperties']);
	}
	
	private function getItems()
	{
		$type = $this->getTypeParam();
		$state = $this->getStateParam();
		if ($state === false && $type === false) return $this->getAllOrdersModel();
		else if ($state === false) return $this->getByTypeModel($type);
		else if ($type === false) return $this->getByStateModel($state);
		else return $this->getByStateAndTypeModel($type, $state);
	}
	
	private function getItemsForPlan()
	{
		$items = $this->getItems();
		if (!$items) return;
		$plan = [];
		foreach ($items as $item) {
			if ($item->state == OrderState::PREPARATION || $item->state == OrderState::WORK) $plan[] = $items;
		}
		return $plan;
	}
	

	

	

}






















