<?php

trait OrderActionTerminal {

	public function getForTerminal()
	{
		$items = $this->getItemsForTerminal();
		if ($items) return ObjectHelper::createArray($items, 'OrderAction', ['setData', 'getProduct', 'getOrder', 'setBgTerminalBox']);
	}
	
	private function getItems()
	{
		$action = $this->getActionParam();
		$id_order = $this->getIdOrderParam();
		if ($action === false && $id_order === false) return $this->getByTypeOrder();
		else if ($id_order === false) return $this->getByActionName();
		else return $this->getByIdOrder();
	}
	
	private function getItemsForTerminal()
	{
		$items = $this->getItems();
		if (!$items) return false;
		$terminal = [];
		foreach ($items as $item) {
			if ($item->state != OrderActionState::ENDED && $item->state != OrderActionState::WAITING) $terminal[] = $item;
		}
		return $terminal;
	}
	
	

}