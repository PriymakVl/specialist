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
		self::setStateModel($params);
		return $this;
	}
	
	public function editTime($params)
	{
		if (empty($params['state'])) return $this;
		if ($params['state'] == OrderActionState::PROGRESS && !$this->time_start) self::setTimeStart($params);
		if ($params['state'] == OrderActionState::ENDED) self::setTimeEnd($params);
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
		$this->states = OrderActionState::getAllByIdAction($params);
		$this->timeMade = $this->countTimeManufactByTimeStates();
		return $this;
	}
	
	private function countTimeManufactByTimeStates()
	{
		$time = 0;
		if (empty($this->states) || count($this->states) == 1) return $time + 1;
		for ($i = 0; $i < count($this->states); $i++) {
			if ($this->states[$i]->state == OrderActionState::PROGRESS && isset($this->states[$i + 1])) {
				$time = $time + ($this->states[$i + 1]->time - $this->states[$i]->time);
			}
		}
		$time = Date::convertTimeToMinutes($time);
		if ($time) return $time;
		else return 1;
	}
	
	
}























