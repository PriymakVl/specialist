<?php

require_once ('statistics_base.php');

class Statistics extends StatisticsBase {
	
	
	public static function countTimeFactMadeProductInOrder($id_order, $id_prod)
	{
		$time_prod = 0;
		$items = OrderAction::getActionsProductInOrder($id_order, $id_prod);
		if (empty($items)) return $time_prod;
		foreach ($items as $item) {
			$action = new OrderAction($item->id); /***/ $action->countFactTimeManufact();
			if ($action->timeMade) $time_prod = $time_prod + $action->timeMade;
		}
		return $time_prod;
	}
	
	
	
}