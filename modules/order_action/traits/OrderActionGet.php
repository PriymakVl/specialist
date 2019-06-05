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
		$methods = ['setData', 'convertState', 'getStates', 'setTimePlan', 'setTimeFact'];
		if ($items) return ObjectHelper::createArray($items, 'OrderAction', $methods);
	}
	
	public function getForPlan()
	{
		$orders = (new Order)->getItemsForPlan();
		if (!$orders) return;
		$actions = $this->getActionsForPlan($orders);
		if ($this->get->action == 'other') $actions = $this->selectByDefaultNames($actions, false);
		else if ($this->get->action) $actions = $this->selectProperty($actions, 'name', $this->get->action);
		if (!$actions) return;
		$actions = ObjectHelper::createArray($actions, 'OrderAction', ['setData', 'getOrder', 'getProduct', 'convertState', 'getWorker']);
		return $this->setDateReady($actions);
	}

	private function getActionsForPlan($orders)
	{
		$actions_total = [];
		foreach ($orders as $order)
		{
			$actions = $this->getByIdOrderModel($order->id);
			if ($actions) $actions_total = array_merge($actions_total, $actions);
		}
		return $this->selectProperty($actions_total, 'state', OrderActionState::ENDED, true);
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
		if ($this->get->action && $this->get->action == 'other') $select = $this->selectByDefaultNames($select, false);
		if ($this->get->action && $this->get->action != 'other') $select = ObjectHelper::selectByValueProperty($select, 'name', $this->get->action);
		if ($select) return ObjectHelper::createArray($select, 'OrderAction', ['setData', 'getOrder', 'getProduct', 'getStates', 'setTimePlan', 'setTimeFact']);
	}
}