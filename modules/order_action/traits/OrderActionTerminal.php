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
		if ($action === false && $id_order === false) return $this->getByTypeOrderModel();
		else if ($id_order === false && $action != 'other') return $this->getByActionNameModel($action);
		else if ($id_order === false && $action == 'other') return $this->getNotDefaultItems();
		else if ($id_order && $action == 'other') return $this->getNotDefaultItemsToOrder();
		else if ($id_order && $action) return $this->getDefaultItemsToOrder();
		else return $this->getByIdOrderModel($id_order);
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
	
	private function getNotDefaultItems()
	{
		$not_default_items = [];
		$items = $this->getByTypeOrderModel();
		if (!$items) return $not_default_items;
		$default_names = (new Action)->getArrayNames();
		foreach ($items as $item) {
			if (!in_array($item->name, $default_names)) $not_default_items[] = $item;
		}
		return $not_default_items;
	}
	
	private function getDefaultItemsToOrder()
	{
		$order_default_items = [];
		$items = $this->getByIdOrderModel($this->getIdOrderParam());
		if (!$items) return $order_default_items;
		foreach ($items as $item) {
			if ($item->name == $this->get->action) $order_default_items[] = $item;
		}
		return $order_default_items;
	}
	
	private function getNotDefaultItemsToOrder()
	{
		$order_not_default_items = [];
		$items = $this->getByIdOrderModel($this->getIdOrderParam());
		if (!$items) return $order_not_default_items;
		$default_names = (new Action)->getArrayNames();
		foreach ($items as $item) {
			if (!in_array($item->name, $default_names)) $order_not_default_items[] = $item;
		}
		return $order_not_default_items;
	}
	
	

}