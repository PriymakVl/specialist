<?php

trait OrderActionTotal {
	
	public function addForProductBase($product)
	{
		$actions = (new ProductAction)->getAllBySymbolProductModel($product->symbol);
		if ($actions) $this->addActions($actions, $product);
		return $this;
	}
	
	public function addForSpecification($specification)
	{
		foreach ($specification as $product) {
				$this->addForProductBase($product);
		}
	}
	
	private function addActions($actions, $product)
	{
		foreach ($actions as $action) {
			$this->addDataModel($action, $product);
		}
	}
	
	public function getForProduct($id_prod = false)
	{
		$id_prod = $id_prod ? $id_prod : $this->get->id_prod;
		$items = $this->getAllByIdProductModel($id_prod);
		if ($items) return ObjectHelper::createArray($items, 'OrderAction', ['setData', 'convertState']);
	}
	
	// public function createArrayActions($ids)
	// {
		 // $actions = Helper::createArrayOfObject($ids, 'OrderAction');
		 // foreach ($actions as $action) {
			// $action->getProduct()->getOrder()->setBgTerminalBox()->convertState();
		 // }
		 // return $actions;
	// }
	
	public function deleteFromProducts($products)
	{
		foreach ($products as $product) {
			$actions = $this->getForProduct($product);
			if ($actions) $this->deleteActions($actions);
		}
	}
	
	public function deleteActions($actions)
	{
		foreach ($actions as $action) {
			$action->delete();
		}
	}
	
	public function getForOrder()
	{
		$items = $this->getAllByIdOrderModel();
		if ($items) return ObjectHelper::createArray($items, 'OrderAction', ['setData', 'convertState', 'getProduct']);//'isStates'
	}
	
	public function getAllNotStateEnded()
	{
		$items = $this->getAllNotStateEndedModel();
		if ($items) return ObjectHelper::createArray($items, 'OrderAction', ['setData', 'getOrder', 'getProduct', 'convertState']);
	}
	
	

	
	
	
	
}






















