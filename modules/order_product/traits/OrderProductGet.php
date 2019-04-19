<?php

trait OrderProductGet {

	public function getAllNotStateEnded()
	{
		$items = self::getAll('order_products');
		$items = $this->selectItemsNotStateEnded($items);
		if ($not_ended) return ObjectHelper::createArray($items, 'OrderProduct', ['setData', 'getOrder', 'convertState']);
	}
	
	public function getAllForOrder()
	{
		$items = $this->getAllForOrderModel();
		if ($items) return ObjectHelper::createArray($items, 'OrderProduct', ['setData', 'getOrder', 'convertState']);
	}
	
	public function getMainForOrder($id_order)
	{
        $items = $this->getByIdOrderModel($id_order);
		debug($items);
		$items = $this->selectMainItems($items);
		debug($items);
		$methods = ['setData', 'getSpecification', 'convertState', 'getActions'];
		if ($main) return ObjectHelper::createArray($items, 'OrderProduct', $methods);
	}

}