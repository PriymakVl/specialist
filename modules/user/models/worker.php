<?php
require_once('user.php');

class Worker extends User {

 public $productsDefault; 
 public $productsCut;
 public $loadTimePlan;
 public $loadPercent;
 public $loadFullFlage; //если указана трудоемкость для всех деталей
 
 
	public static function getAllWithStatistics()
	{
		$workers = self::getWorkers();
		foreach ($workers as $worker) {
			$worker->productsDefault = OrderProducts::getForWorker($worker);
			$worker->loadFullFlage = Statistics::checkTimeManufacturing($worker->productsDefault);
			$worker->loadTimePlan = Statistics::getTimeManufacturingPlan($worker->productsDefault);
			$worker->loadPercent = Statistics::getLoadPercentage($worker->loadTimePlan);
		}
		return $workers;
	}
	
	
	
	
    
	
}























