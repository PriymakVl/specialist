<?php
require_once('order_action_static.php');

class OrderAction extends OrderActionStatic {
	
	public $states;
	
	public function __construct($id)
    {
        $this->tableName = 'order_actions';
        parent::__construct($id);
		$this->message->section = 'order_action';
    }
	
	public function getProduct()
	{
		$this->product = new Product($this->id_prod);
		return $this;
	}
	
	public function getOperation()
	{
		$this->operation = new Operation($this->id_operation);
		return $this;
	}
	
	public function editState($params)
	{
		OrderActionState::add($params);
		self::updateState($params);
		return $this;
	}
	
	public function getAllStates($params)
	{
		$items = OrderActionState::getAllByIdAction($params);
		foreach ($items as $item) {
			$state = new OrderActionState($item->id);
			$state->setDuration($items)->getWorker()->setName()->setBg();
			$this->states[] = $state;
		}
		return $this;
	}
	
	public function startWork($params)
	{
		OrderActionState::add($params);
		self::setStateStartWork($params);
		return $this;
	}
	
	public function stopWork($params)
	{
		OrderActionState::add($params);
		self::setStateStopWork($params);
		return $this;
	}
	
	public function endWork($params)
	{
		OrderActionState::add($params);
		self::setStateEndWork($params);
		return $this;
	}
	
	// public function isStates()
	// {
		// $params = ['id_action' => $this->id, 'type_action' => 'plan', 'status' => self::STATUS_ACTIVE];
		// $items = OrderActionState::getAllByIdAction($params);
		// if ($items) $this->states = true;
		// return $this;
	// }
	
	
}























