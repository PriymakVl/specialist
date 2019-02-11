<?php
require_once('user.php');

class Worker extends User {

 public $productsOrder; 
 public $ordersPlan;
 public $timeManufacturingTotal = 0;
 public $workingLoad = 0;
 
 const TIME_FULL_WORKING_DAY = 22400;
 
 
	public function getOrdersPlan()
	{
		$this->ordersPlan = Order::getForWorker($this); 
		self::getTimeManufacturingForOrder();
		return $this;
	}
	
	private function getTimeManufacturingForOrder() {
		if (empty($this->ordersPlan)) return;
		foreach ($this->ordersPlan as $order) {
			$order->getTimeManufacturingForWorker($this);
		}
	}
	
	public static function getWorkersWithProperties()
	{
		$workers = self::getWorkers();
		foreach ($workers as $worker) {
			$worker->getOrdersPlan()->getTimeManufacturingTotal()->getWorkingLoad();
		}
		return $workers;
	}
	
	private function getTimeManufacturingTotal()
	{
		foreach ($this->ordersPlan as $order) {
			$this->timeManufacturingTotal = $this->timeManufacturingTotal + $order->timeManufacturingForWorker;
		}
		return $this;
	}
	
	public function getWorkingLoad()
	{
		if (!$this->timeManufacturingTotal) return;
		$this->workingLoad = round(($this->timeManufacturingTotal * 100) / self::TIME_FULL_WORKING_DAY);
		return $this;
	}
	
	
    
	
}























