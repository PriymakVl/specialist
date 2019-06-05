<?php

trait OrderProductGet {
	
	public function getForPlan()
	{
		$orders = (new Order)->getItemsForPlan();
		if (!$orders) return;
		$products = $this->getProductsForPlan($orders);
		if (!$products) return;
		$products = ObjectHelper::createArray($products, 'OrderProduct', ['setData', 'getOrder', 'convertState', 'getActions']);
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

	private function getProductsForPlan($orders)
	{
		$products_total = [];
		foreach ($orders as $order) {
			$products = $this->getByIdOrderModel($order->id);
			if ($products) $products_total = array_merge($products_total, $products);
		}
		$main = $this->selectMainItems($products_total);
		return $this->selectProperty($main, 'state', OrderProduct::STATE_ENDED, true);
	}

}