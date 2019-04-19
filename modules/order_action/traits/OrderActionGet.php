<?php

trait OrderActionGet {

	public function getForOrder()
	{
		$items = $this->getByIdOrderModel();
		if ($items) return ObjectHelper::createArray($items, 'OrderAction', ['setData', 'convertState', 'getProduct', 'isStates']);
	}
	
	public function getForProduct($id_prod = false)
	{
		$id_prod = $id_prod ? $id_prod : $this->get->id_prod;
		$items = $this->getByIdProductModel($id_prod);
		if ($items) return ObjectHelper::createArray($items, 'OrderAction', ['setData', 'convertState']);
	}
	
	public function getForPlan()
	{
		$items = $this->getByTypeOrderModel();
		$items = $this->selectItemsForPlan($items);
		if ($items) return ObjectHelper::createArray($items, 'OrderAction', ['setData', 'getOrder', 'getProduct', 'convertState']);
	}
}