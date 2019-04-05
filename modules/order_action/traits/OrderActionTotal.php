<?php

trait OrderActionTotal {
	
	public function addForProduct($product)
	{
		$actions = (new ProductAction)->getAllBySymbolProduct($product->symbol);
		if ($actions) $this->addAction($actions, $product);
		return $this;
	}
	
	public function addForSpecification($specification)
	{
		foreach ($specification as $product) {
				$this->addForProduct($product);
		}
	}
	
	private function addAction($actions, $product)
	{
		foreach ($actions as $action) {
			self::addModel($action, $product);
		}
	}
	
	public function getForProduct()
	{
		$items = $this->getAllByIdProduct();
		if ($items) return ObjectHelper::createArray($items, 'OrderAction', ['setData', 'getProperties']);
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
		$items = $this->getAllByIdOrder();
		if ($items) return ObjectHelper::createArray($items, 'OrderAction', ['setData', 'convertState', 'getProduct', 'getProperties']);//'isStates'
	}
	

	

	
	

	
	
	
	
}























