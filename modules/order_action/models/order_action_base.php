<?php
require_once('./core/model.php');

class OrderActionBase extends Model {

	public $product;
	public $order;
	public $states;
	public $convertState;
	public $action;//объект операции обработки
	public $bgState;
	public $bgTerminalBox;
	
	const BG_TERMINAL_BOX_PLAN = 'yellow';
	const BG_TERMINAL_BOX_PROGRESS = 'green';
	const BG_TERMINAL_BOX_STOPPED = 'red';
	const BG_TERMINAL_BOX_PRIORITY = 'Aqua';
	
	public function convertState()
	{
		$this->convertState = OrderActionStatic::convertStateWork($this->state);
		return $this;
	}
	
	public function setBgState()
	{
		$this->bgState = OrderActionStatic::getBgStateWork($this->state);
		return $this;
	}
	
	public function setBgTerminalBox()
	{
		if ($this->state == OrderActionState::PROGRESS) $this->bgTerminalBox = self::BG_TERMINAL_BOX_PROGRESS;
		else if ($this->state == OrderActionState::STOPPED) $this->bgTerminalBox =  self::BG_TERMINAL_BOX_STOPPED;
		else $this->bgTerminalBox = self::BG_TERMINAL_BOX_PLAN;
		//only plan actions
		if (get_class($this) == 'OrderAction' && $this->state == OrderActionState::PLANED) {
			if ($this->rating == Order::RATING_IMPORTANT || $this->rating == Order::RATING_PRIORITY) $this->bgTerminalBox =  self::BG_TERMINAL_BOX_PRIORITY;
		}
		return $this;
	}
	
	public function getOrder()
	{
		$this->order = new Order($this->id_order);
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
	
	public function checkReadyOrder()
	{
		Order::CheckReadyStatic($this->id_order);
		return $this;
	}

	


	
	
}























