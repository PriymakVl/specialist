<?php

trait OrderActionTerminal {

	public function getForTerminal()
	{
		$items = $this->getItemsForTerminal();
		if ($items) $items = $this->selectItemsForTerminal($items);
		if ($items) return ObjectHelper::createArray($items, 'OrderAction', ['setData', 'getProduct', 'getOrder', 'setBgTerminalBox']);
	}
	
	private function getItemsForTerminal()
	{
		$action = $this->getActionParam();
		$id_order = $this->getIdOrderParam();
		if ($action === false && $id_order === false) return $this->getByTypeOrderModel();
		else if ($id_order === false && $action && $action != 'other') return $this->getByActionNameModel($action);
		else if ($id_order === false && $action == 'other') return $this->selectItemsByNames($this->getByTypeOrderModel(), false);
		else if ($id_order && $action == 'other') return $this->selectItemsByNamesForOrder(false);
		else if ($id_order && $action) return $this->selectItemsByNameForOrder();
		else return $this->getByIdOrderModel($id_order);
	}
	

	
	
	

	
	
	
	

}