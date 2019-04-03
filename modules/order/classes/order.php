<?php

class Order extends OrderBase {
	
	use OrderTotal, OrderConvert, OrderTime;
	
    public function __construct($id_order = false)
    {
        $this->tableName = 'orders';
        parent::__construct($id_order);
		$this->message->section = 'order';
    }
	
	public function addData()
	{
		$id_order = $this->addDataModel();
		return (new self)->setData($id_order);
	}
	
	public function setActive()
	{
		$this->setSession('id_order_active', $this->id);
		return $this;
	}
	
	public function edit()
	{
		$this->editData();
		return $this;
	}
	
	public function editState()
	{
		if ($this->post->state == $this->state) return $this;
		$this->setState($this->post->state);
		$order = (new Order)->setData($this->id)->getPositions()->getProducts(); //with new state
		(new OrderProduct)->editState($order);
		// (new OrderAction)->editState($this);
		return $this;
	}
	
	public function getPositions()
	{
		$this->positions = (new OrderPosition)->getAllByIdOrder($this->id);
		return $this;
	}
	
	public function getPositionsTable()
	{
		if ($this->positions) $this->positionsTable = (new OrderPosition)->convertPositionsToTable($this->positions);
		return $this;
	}
	
	public function delete()
	{
		parent::delete();
		// self::deleteStatic($this->id);
		return $this;
	}
	
	// public function getActions()
	// {
		// if ($this->state < OrderState::WORK) return $this;
		// $items = OrderAction::getIdActionsByIdOrder($this->id);
		// foreach ($items as $item) {
			// $action = new OrderAction($item->id);
			// $action->getProduct()->convertState()->setBgState()->isStates();
			// $this->actions[] = $action;
		// }
		// return $this;
	// }
	
	public function getActionsUnplan()
	{
		if ($this->state < OrderState::WORK) return $this;
		$items = OrderActionUnplan::getByIdOrder($this->id); /***/ if (empty($items)) return $this;
		foreach ($items as $item) {
			$action_unplan = new OrderActionUnplan($item->id);
			$action_unplan->convertState()->setBgState();
			$this->actionsUnplan[] = $action_unplan;
		}
		return $this;
	}
	
	public function getProducts()
	{
		$this->products = (new OrderProduct)->getMainParentOrder($this->id);
		return $this;
	}
	
	public function checkReady()
	{
		$this->checkReadyTotal();
		return $this;
	}
	
	public function search()
	{
		$items = $this->searchBySymbol();
		if ($items) return ObjectHelper::createArray($items, 'Order', ['setData', 'getPositions', 'getPositionsTable']);
	}
    
	
}























