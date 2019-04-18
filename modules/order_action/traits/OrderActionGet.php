<?php

trait OrderActionGet {

	public function getForOrder()
	{
		$items = $this->getAllByIdOrderModel();
		if ($items) return ObjectHelper::createArray($items, 'OrderAction', ['setData', 'convertState', 'getProduct']);//'isStates'
	}
	
	public function getForProduct($id_prod = false)
	{
		$id_prod = $id_prod ? $id_prod : $this->get->id_prod;
		$items = $this->getAllByIdProductModel($id_prod);
		if ($items) return ObjectHelper::createArray($items, 'OrderAction', ['setData', 'convertState']);
	}
	
	public function getAllNotStateEnded()
	{
		$items = $this->getAllNotStateEndedModel();
		if ($items) return ObjectHelper::createArray($items, 'OrderAction', ['setData', 'getOrder', 'getProduct', 'convertState']);
	}
}