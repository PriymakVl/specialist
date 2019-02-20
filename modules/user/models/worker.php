<?php
require_once('user.php');

class Worker extends User {

 public $productsCut;
 public $loadTimePlan;
 public $timeMadeToday;
 public $loadPercent;
 public $loadFullFlage; //если указана трудоемкость для всех деталей
 
 
	public static function getAllWithStatistics()
	{
		$workers = self::getWorkers();
		foreach ($workers as $worker) {
			$worker = self::setPlanStatistics($worker);
			$worker = self::setMadeStatisticsToday($worker);
			//$worker = self::set
		}
		return $workers;
	}
	
	private static function setPlanStatistics($worker)
	{
		$products = OrderProducts::getForWorker($worker);
		$worker->loadTimePlan = Statistics::getTimeManufacturing($products);
		$worker->loadPercent = Statistics::getLoadPercentage($worker->loadTimePlan);
		return  $worker;
	}
	
	private static function setMadeStatisticsToday($worker)
	{
		$products = OrderProducts::madeWorkerToday(ParamWorker::forMadeWorkerToday($worker->id));
		$worker->timeMadeToday = Statistics::getTimeManufacturing($products);
		return $worker;
	}
/* 	
	private static function earnedToday($worker)
	{
		if (!$worker->timeMadeToday) return;
		$this->earnedToday = $worker->timeMadeToday * 
	} */
	
	
	
	
	
	
    
	
}























