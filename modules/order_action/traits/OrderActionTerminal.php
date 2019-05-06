<?php

trait OrderActionTerminal {

	public function getForTerminal()
	{
		$items = $this->getItemsForTerminal();
		if ($items) return ObjectHelper::createArray($items, 'OrderAction', ['setData', 'getProduct', 'getOrder', 'setBgTerminalBox']);
	}
	
	private function getItemsForTerminal()
	{
		if ($this->get->id_order) $items = $this->getByIdOrderModel();
		else $items = $this->getByStateModel(OrderActionState::ENDED, true);
		if (!$items) return;
		$items = $this->selectProperties($items, 'state', [OrderActionState::ENDED, OrderActionState::WAITING], true);
		if (!$items) return;
		$items = $this->selectProperty($items, 'type_order', $this->getTypeOrderParam());
		if (!$items) return;
		return $this->getItemsByGetRequest($items);
	}
	
	public function getItemsByGetRequest($items)
	{
		if (!$items) return;
		if ($this->get->action == 'my') return $this->selectForWorker($items);
		else if ($this->get->action == 'other') return $this->selectByDefaultNames($items, false);//for other actions
		else if ($this->get->action) return $this->selectProperty($items, 'name', $this->get->action);
		return $items;
	}
	

	
	
	

	
	
	
	

}