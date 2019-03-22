<?php

require_once ('statistics_base.php');

class Statistics extends StatisticsBase {
	
	const TIME_FULL_WORKING_DAY = 390;//рабочее время в сутках в минутах при 8ч рабочем дне (6ч 30мин)
	
	public static function countLoadPercentage($timePlan)
	{
		if ($timePlan) return round($timePlan * 100 / self::TIME_FULL_WORKING_DAY);
	}
	
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