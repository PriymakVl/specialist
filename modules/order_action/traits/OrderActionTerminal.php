<?php

trait OrderActionTerminal {

	// public function getForTerminal($params)
	// {
		// if ($params['action'] == 'all' && $params['order'] == 'all') $ids = self::getAllNotReadyActions($params);
		// else if ($params['action'] != 'all' && $params['order'] == 'all' ) $ids = self::getForAllOrders($params);
		// else $ids = self::getForOneOrder($params);
		// return self::createArrayActions($ids);
	// }
	
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
	
	public function getOrdersForTerminal()
	{
		$orders = [];
		$items = self::getOrdersWhereStateActionsNotEnded();
		if (empty($items)) return $orders;
		foreach ($items as $item) {
			$orders[] = new Order($item->id_order);
		}
		return $orders;
	}
}