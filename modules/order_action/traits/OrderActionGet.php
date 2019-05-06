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
		$items = $this->selectItemsByState($this->getByTypeOrderModel(), OrderActionState::ENDED, true);
		if (!$items) return;
		if ($this->get->action == 'other') $items = $this->selectItemsByDefaultNames($items, false);
		else if ($this->get->action) $items = $this->selectItemsByName($items, $this->get->action);
		$actions = ObjectHelper::createArray($items, 'OrderAction', ['setData', 'getOrder', 'getProduct', 'convertState']);
		if (isset($actions)) return $this->setDateReady($actions);
	}
	
	public function getForWorker($worker)
	{
		$items = $this->getByTypeOrderModel();
		if ($items) $items = $this->selectItemsByStates($items, [OrderActionState::ENDED, OrderActionState::WAITING], true);
		if (!$items) return;
		$select = $this->selectItemsForWorker($items, $worker);
		if ($select) $actions = ObjectHelper::createArray($select, 'OrderAction', ['setData', 'getOrder', 'getProduct', 'convertState']);
		if (isset($actions)) return $this->setDateReady($actions);
	}
}