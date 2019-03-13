<?php
require_once('order_action_static.php');

class OrderAction extends OrderActionStatic {
	
	public $name;
	public $price;
	public $timeMade;
	
	public function __construct($id)
    {
        $this->tableName = 'order_actions';
        parent::__construct($id);
		$this->message->section = 'order_action';
		$this->getProperties();
    }
	
	public function getProduct()
	{
		$this->product = new Product($this->id_prod);
		return $this;
	}
	
	public function getProperties()
	{
		$item = new DataAction($this->id_data);
		$this->name = $item->name;
		$this->price = $item->price;
	}
	
	public function editState($params)
	{
		OrderActionState::add($params);
		self::updateState($params);
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
	
	public function isStates()
	{
		$params = ['id_action' => $this->id, 'type' => 'plan', 'status' => self::STATUS_ACTIVE];
		$items = OrderActionState::getAllByIdAction($params);
		if ($items) $this->states = true;
		return $this;
	}
	
	public function countFactTimeManufact()
	{
		$params = ['id_action' => $this->id, 'status' => self::STATUS_ACTIVE, 'type' => 'plan'];
		$states = OrderActionState::getAllByIdAction($params);
		if (count($states) > 1) $this->timeMade = $this->countTimeManufactByTimeStates($states);
		else if ($this->time_end) {
			$this->timeMade = Date::convertTimeToMinutes($this->time_end - $this->time_start);
		}
		return $this;
	}
	
	private function countTimeManufactByTimeStates($states)
	{
		for ($i = 0; $i < count($states); $i++) {
			if (empty($states[$i + 1])) break;
			$time = $time + ($states[$i + 1]->time - $states[$i]->time);
		}
		return Date::convertTimeToMinutes($time);
	}
	
	
}























