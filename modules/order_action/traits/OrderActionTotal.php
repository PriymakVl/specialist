<?php

trait OrderActionTotal {
	
	public function addForProduct($product)
	{
		$actions = (new ProductAction)->getAllBySymbolProduct($product->options->symbol);
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
			self::addOne($action, $product);
		}
	}
	
	public function getForProduct($product)
	{
		$params = ['id_prod' => $product->id, 'id_order' => $product->id_order, 'status' => STATUS_ACTIVE];
		$items = $this->getByIdProductAndIdOrder($params);
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
	

	

	
	

	
	
	
	
}























