<?php
require_once('worker_static.php');

class Worker extends WorkerStatic {

	 public $productsCut;
	 public $loadTimePlan;
	 public $timeMade;
	 public $loadPercent;
	 public $loadFullFlage; //если указана трудоемкость для всех деталей
	 public $defaultActions;
	 public $costMade; //сколько заработал
	 
 
	public function getActionsPlan()
	{
		$params = ParamWorker::plan($this->login);
		$items = OrderAction::planWorker($params);
		return $this->getActionsWithProperties($items);
	}
	
	public function getActionsMade()
	{
		$params = ParamWorker::made($this->id);
		$items = OrderAction::madeWorker($params);
		return $this->getActionsWithProperties($items);
	}
	
	private function getActionsWithProperties($items)
	{
		if (empty($items)) return false;
		foreach ($items as $item) {
			$order_action = new OrderAction($item->id);
			$order_action->getProduct()->getAction()->getOrder();
			$order_actions[] = $order_action;
		}
		return $order_actions;
	}
	
	
	
	
	
	
	
	
	
    
	
}























