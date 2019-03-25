<?php

trait OrderActionTerminal {

	public static function getOrdersForTerminal()
	{
		$orders = [];
		$slq = 'SELECT `id_order` FROM `order_actions` WHERE `state` != :state AND `status` = :status GROUP BY `id_order`';
		$params = ['state' => OrderActionState::ENDED, 'status' => STATUS_ACTIVE];
		$items = self::perform($slq, $params)->fetchAll();
		if (empty($items)) return $orders;
		foreach ($items as $item) {
			$orders[] = new Order($item->id_order);
		}
		return $orders;
	}
}