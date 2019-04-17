<?php

trait OrderProductGet {

	public function getAllNotStateEnded()
	{
		$items = self::getAll('order_products');
		if (!$items) return;
		$not_ended = [];
		foreach ($items as $item) {
			if ($item->state != self::STATE_ENDED) $not_ended[] = $item;
		}
		if ($not_ended) return ObjectHelper::createArray($items, 'OrderProduct', ['setData', 'getOrder', 'convertState']);
	}
	
	public function getAllForOrder()
	{
		$items = $this->getAllForOrderModel();
		if ($items) return ObjectHelper::createArray($items, 'OrderProduct', ['setData', 'getOrder', 'convertState']);
	}
	
	public function getMainForOrder()
	{
        $items = $this->getAllForOrderModel();
		if (!$items) return;
		$main = [];
		foreach ($items as $item) {
			if ($item->id_parent == self::ID_MAIN_ORDER) $main[] = $item;
		}
		$methods = ['setData', 'getSpecification', 'convertState', 'getActions'];
		if ($main) return ObjectHelper::createArray($items, 'OrderProduct', $methods);
	}

}