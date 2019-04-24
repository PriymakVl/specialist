<?php

trait OrderProductGet {

	// public function getAllNotStateEnded()
	// {
		// $items = self::getAll('order_products');
		// if ($items) $not_ended = $this->selectItemsNotStateEnded($items);
		// if ($not_ended) return ObjectHelper::createArray($items, 'OrderProduct', ['setData', 'getOrder', 'convertState', 'getActions']);
	// }
	
	public function getForPlan()
	{
		$items = $this->selectItemsNotStateEnded(self::getAll('order_products'));
		$main = $this->selectMainItems($items);
		$products = ObjectHelper::createArray($main, 'OrderProduct', ['setData', 'getOrder', 'convertState', 'getActions']);
		return $this->setDateReady($products);
	}
	
	public function getAllForOrder($id_order = false)
	{
		$items = $this->getByIdOrderModel($id_order);
		if ($items) return ObjectHelper::createArray($items, 'OrderProduct', ['setData', 'getOrder', 'convertState', 'getActions']);
	}
	
	public function getMainForOrder($id_order = false)
	{
        $items = $this->getByIdOrderModel($id_order);
		$main = $this->selectMainItems($items);
		$methods = ['setData', 'getSpecification', 'convertState', 'getActions'];
		if ($main) return ObjectHelper::createArray($main, 'OrderProduct', $methods);
	}

}