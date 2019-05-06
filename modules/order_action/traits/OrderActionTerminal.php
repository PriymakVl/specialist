<?php

trait OrderActionTerminal {

	public function getForTerminal()
	{
		$items = $this->getItemsForTerminal();
		if ($items) return ObjectHelper::createArray($items, 'OrderAction', ['setData', 'getProduct', 'getOrder', 'setBgTerminalBox']);
	}
	
	// private function getItemsForTerminal()
	// {
		// $action = $this->getActionParam();
		// $id_order = $this->getIdOrderParam();
		// debug($id_order);
		// if ($action === null && $id_order == null) return false;//for worker actions 
		// else if ($action === false && $id_order === false) return $this->getByTypeOrderModel();//for all actions
		// else if (!$id_order && $action && $action != 'other') return $this->getByActionNameModel($action);
		// else if (!$id_order && $action == 'other') return $this->selectItemsByNames($this->getByTypeOrderModel(), false);//for other actions
		// else if ($id_order && $action == 'other') return $this->selectItemsByNamesForOrder(false);//for other actions
		// else if ($id_order && $action) return $this->selectItemsByNameForOrder();
		// else return $this->getByIdOrderModel($id_order);
	// }
	
		// private function getItemsForTerminal()
	// {
		// if ($this->get->action == 'my') return false;
		// else if ($this->get->id_order && $this->get->action == 'other') return $this->selectItemsByNamesForOrder(false);//for other actions
		// else if ($this->get->id_order && $this->get->action) return $this->selectItemsByNameForOrder();
		// else if ($this->get->id_order) return $this->getByIdOrderModel();
		// else if (!$this->get->id_order && $this->get->action == 'other') return $this->selectItemsByNames($this->getByTypeOrderModel(), false);//for other actions
		// else if (!$this->get->id_order && $this->get->action) return $this->getByActionNameModel($this->get->action);
		// else return $this->getByTypeOrderModel();//for all actions
	// }
	
	private function getItemsForTerminal()
	{
		if ($this->get->id_order) $items = $this->getByIdOrderModel();
		else $items = $this->getByStateModel(OrderActionState::ENDED, true);
		if (!$items) return;
		$items = $this->selectItemsByStates($items, [OrderActionState::ENDED, OrderActionState::WAITING], true);
		if (!$items) return;
		$items = $this->selectItemsByTypeOrder($items);
		if (!$items) return;
		return $this->getItemsByGetRequest($items);
	}
	
	public function getItemsByGetRequest($items)
	{
		if (!$items) return;
		if ($this->get->action == 'my') return $this->selectItemsForWorker($items);
		else if ($this->get->action == 'other') return $this->selectItemsByDefaultNames($items, false);//for other actions
		else if ($this->get->action) return $this->selectItemsByName($items, $this->get->action);
		return $items;
	}
	

	
	
	

	
	
	
	

}