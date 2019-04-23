<?php

trait OrderActionGet {

	public function getForOrder($id_order = false)
	{
		$items = $this->getByIdOrderModel($id_order);
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
		if ($items) $actions = ObjectHelper::createArray($items, 'OrderAction', ['setData', 'getOrder', 'getProduct', 'convertState']);
		return $this->setDateReady($actions);
	}
}