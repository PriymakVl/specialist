<?php

trait OrderActionTerminal {
	
	use OrderActionModelTerminal;

	public function getForTerminal()
	{
		$items = $this->getItemsForTerminal();
		if ($items) return ObjectHelper::createArray($items, 'OrderAction', ['setData', 'getProduct', 'getOrder', 'setBgTerminalBox']);
	}
	
	private function getItemsForTerminal()
	{
		if (!$this->get->order) $this->get->order = 'all';
		if ($this->get->action == 'all' && $this->get->order == 'all') $items = $this->getAllNotReadyForTerminalModel();
		else if ($this->get->action != 'all' && $this->get->order == 'all' ) $items = $this->getForAllOrdersForTerminalModel();
		else $items = $this->getAllForOneOrderTerminalModel();
		return $items;
	}
	
	// public function getOrdersForTerminal()
	// {
		// $orders = [];
		// $slq = 'SELECT `id_order` FROM `order_actions` WHERE `state` != :state AND `status` = :status GROUP BY `id_order`';
		// $params = ['state' => OrderActionState::ENDED, 'status' => STATUS_ACTIVE];
		// $items = self::perform($slq, $params)->fetchAll();
		// if (empty($items)) return $orders;
		// foreach ($items as $item) {
			// $orders[] = new Order($item->id_order);
		// }
		// return $orders;
	// }

}