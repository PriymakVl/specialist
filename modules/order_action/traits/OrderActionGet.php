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
		if (!$items) return;
		$items = $this->selectProperty($items, 'state', OrderActionState::ENDED, true);
		if (!$items) return;
		if ($this->get->action == 'other') $items = $this->selectByDefaultNames($items, false);
		else if ($this->get->action) $items = $this->selectProperty($items, 'name', $this->get->action);
		$actions = ObjectHelper::createArray($items, 'OrderAction', ['setData', 'getOrder', 'getProduct', 'convertState']);
		if (isset($actions)) return $this->setDateReady($actions);
	}
	//for plan page
	public function getForWorker($worker)
	{
		$items = $this->getByTypeOrderModel();
		if (!$items) return;
		$items = $this->selectProperties($items, 'state', [OrderActionState::ENDED, OrderActionState::WAITING], true);
		if (!$items) return;
		$select = $this->selectForWorker($items, $worker);
		if ($select) $actions = ObjectHelper::createArray($select, 'OrderAction', ['setData', 'getOrder', 'getProduct', 'convertState']);
		if (isset($actions)) return $this->setDateReady($actions);
	}
	//for statistics page
	public function getForWorkerMade($worker)
	{
		$items = $this->getByDateEndModel();
		if (!$items) return;
		$select = $this->selectForWorkerFact($items, $worker->id);
		if ($select) return ObjectHelper::createArray($select, 'OrderAction', ['setData', 'getOrder', 'getProduct', 'getStates', 'setTimePlan', 'setTimeFact']);
	}
}