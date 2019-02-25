<?php
require_once('user.php');

class Worker extends User {

 public $productsCut;
 public $loadTimePlan;
 public $timeMadeToday;
 public $loadPercent;
 public $loadFullFlage; //если указана трудоемкость для всех деталей
 public $defaultActions;
 
 const ACTION_CHPU = 2; //побработка на чпу
 const ACTION_UNIVER = 3; //обработка на универ
 const ACTION_FREZ = 4; //фрезерование
 const ACTION_ASSEMB = 6; // сборка 
 const ACTION_CUT = 1; //орезка заготовки
 
	public static function getAllWithStatistics()
	{
		$workers = self::getWorkers();
		foreach ($workers as $worker) {
			$worker = self::setPlanStatistics($worker);
			//$worker = self::setMadeStatisticsToday($worker);
			//$worker = self::set
		}
		return $workers;
	}
	
	private static function setPlanStatistics($worker)
	{
		$actions = OrderAction::getByIdActions(ParamWorker::forMadeWorkers($worker->login));
		$worker->loadTimePlan = self::countLoadTimePlan($actions);
		$worker->loadPercent = Statistics::countLoadPercentage($worker->loadTimePlan);
		return  $worker;
	}
	
	private static function setMadeStatisticsToday($worker)
	{
		$products = OrderProducts::madeWorkerToday(ParamWorker::forMadeWorkerToday($worker->id));
		$worker->timeMadeToday = Statistics::getTimeManufacturing($products);
		return $worker;
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
		foreach ($actios as $action) {
			if ($actions->time_manufac) $load_time = $load_time + $action->time_manufac;
		}
		return $load_time;
	}
/* 	
	private static function earnedToday($worker)
	{
		if (!$worker->timeMadeToday) return;
		$this->earnedToday = $worker->timeMadeToday * 
	} */
	
	
	
	
	
	
    
	
}























