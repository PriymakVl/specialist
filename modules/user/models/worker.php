<?php
require_once('worker_static.php');

class Worker extends WorkerStatic {

	 //public $productsCut;
	 //public $loadTimePlan;
	 //public $timeMade;
	 //public $loadPercent;
	 //public $loadFullFlage; //если указана трудоемкость для всех деталей
	 //public $defaultActions;
	 //public $costMade; //сколько заработал
	 public $actions;
	 public $actions_unplan;
	 
 
	// public function getActionsPlan()
	// {
		// $params = ParamWorker::plan($this->login);
		// $items = OrderAction::planWorker($params);
		// return $this->getActionsWithProperties($items);
	// }
	
	public function getActionsMade($params)
	{
		$items = OrderAction::madeWorker($params);
		debug($items);
		foreach ($items as $item) {
			$action = new OrderAction($item->id);
			$action->getProduct()->getAction()->getOrder();
			$this->actions[] = $action;
		}
		return $this;
	}
	
	// private function getActionsWithProperties($items)
	// {
		// if (empty($items)) return false;
		// foreach ($items as $item) {
			// $order_action = new OrderAction($item->id);
			// $order_action->getProduct()->getAction()->getOrder();
			// $order_actions[] = $order_action;
		// }
		// return $order_actions;
	// }
	
	public function getActionsUnplan($params)
	{
		//$actions = OrderActions
	}
	
	
	
	
	
	
	
	
	
    
	
}























