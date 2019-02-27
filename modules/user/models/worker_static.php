<?php
require_once('user.php');

class WorkerStatic extends User {
 
 const ACTION_CHPU = 2; //побработка на чпу
 const ACTION_UNIVER = 3; //обработка на универ
 const ACTION_FREZ = 4; //фрезерование
 const ACTION_ASSEMB = 6; // сборка 
 const ACTION_CUT = 1; //орезка заготовки
 
 const COST_WORK_MINUTE = '0.85';
 
	public static function getAllWithStatistics()
	{
		$workers = self::getWorkers();
		foreach ($workers as $worker) {
			$worker = self::setPlanStatistics($worker);
			self::setMadeStatistics($worker);
			$worker->costMade = self::countCostMade($worker->timeMade);
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























