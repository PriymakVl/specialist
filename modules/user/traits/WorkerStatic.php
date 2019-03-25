<?php

trait WorkerStatic  {
 
	public static function getAllWithStatistics()
	{
		$workers = self::getWorkers();
		foreach ($workers as $worker) {
			$worker->countTimePlan()->countLoad()->countTimeMade()->costMade();
		}
		return $workers;
	}
	
	private static function setPlanStatistics($worker)
	{
		$params = ParamWorker::plan($worker->login);
		$actions = OrderAction::planWorker($params);
		$worker->loadTimePlan = self::countLoadTimePlan($actions);
		$worker->loadPercent = Statistics::countLoadPercentage($worker->loadTimePlan);
		return  $worker;
	}
	
	private static function setMadeStatistics($worker)
	{
		$params = ParamOrderAction::madeWorker($worker->id);
		$actions = OrderAction::madeWorker($params);
		$worker->timeMade = Statistics::countTimeMadeWorker($actions);
	}
	
	public static function setDefaultActions($login)
	{
		switch ($login) {
			case 'Logvinov': return [self::ACTION_CHPU, self::ACTION_UNIVER];
			case 'Kovbasa': return [self::ACTION_FREZ, self::ACTION_ASSEMB];
			default: exit('Не указаны операции по обработке по умолчанию');
		}
	}
	
	private static function countLoadTimePlan($actions)
	{
		$load_time = 0;
		foreach ($actions as $action) {
			if ($action->time_manufac) $load_time = $load_time + $action->time_manufac;
		}
		return $load_time;
	}
		
	private static function countCostMade($time)
	{
		if (!$time) return 0;
		$cost_made = $time * self::COST_WORK_MINUTE;
		return round($cost_made, 2);
	}   
	
}























