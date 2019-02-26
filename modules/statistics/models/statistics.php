<?php

require_once ('statistics_base.php');

class Statistics extends StatisticsBase {
	
	const TIME_FULL_WORKING_DAY = 390;//рабочее время в сутках в минутах при 8ч рабочем дне (6ч 30мин)
	
	public static function countLoadPercentage($load_time)
	{
		if ($load_time) return round($load_time * 100 / 390);
	}
	
	public static function countTimeMadeWorker($actions)
	{
		$time_made = 0;
		if (!$actions) return $time_made;
		foreach ($actions as $action) {
			if($action->time_manufac) $time_made = $time_made + $action->time_manufac;
		}
		return $time_made;
	}
	
}