<?php

require_once ('statistics_base.php');

class Statistics extends StatisticsBase {
	
	const TIME_FULL_WORKING_DAY = 390;//рабочее время в сутках в минутах при 8ч рабочем дне (6ч 30мин)
	
	public static function countLoadPercentage($timePlan)
	{
		if ($timePlan) return round($timePlan * 100 / self::TIME_FULL_WORKING_DAY);
	}
	
	
	
}