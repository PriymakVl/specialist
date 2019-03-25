<?php

class Order extends OrderBase {
	
    public function __construct($id_order = false)
    {
        $this->tableName = 'orders';
        parent::__construct($id_order);
		$this->message->section = 'order';
    }
	
	public function getData($id_order = false)
	{
		$id_order = $id_order ? $id_order : $this->params->id_order;
		if (empty($id_order)) return exit('Not id_position in method getData');
		parent::getData($id_order);
		return $this;
	}
	
	public function addData()
	{
		$id_order = self::addDataModel();
		return (new self)->getData($id_order);
	}
	
	public function setActive()
	{
		$this->setSession('id_order_active', $this->id);
		return $this;
	}

    public function getContent()
    {
        $this->content = OrderContent::get($this->id);
        return $this;
    }
	
	// public function addContent()
	// {
		// OrderContent::add();
		// return $this;
	// }
	
	public function edit($params)
	{
		Order::editModel($params);
		OrderAction::updateRating($this->id, $params['rating']);
		return $this;
	}
	
	public function toPreparation()
	{
		if ($this->positions) OrderContent::addByPositionsOrder($this->positions);
		return $this;
	}
	
	public function toWork()
	{	
		$this->getContent();
		$products = OrderExtractProducts::get($this->content);
		OrderAction::add($products, $this);
		return $this;
		//todo для учета статистики добавить состояние в OrderState
		//$products = $this->getListOfProduct();
	}
	
	public function toMade()
	{
		OrderAction::setStateEndedForAllActionsOrder($this->id);
		OrderActionUnplan::setStateEndedForAllActionsOrder($this->id);
		return $this;
	}
	
	public function getPositions()
	{
		$this->positions = OrderPosition::getAllByIdOrder($this->id);
		return $this;
	}
	
	public function getPositionsTable()
	{
		if (!$this->positions) return;
		$this->positionsTable = '<table>';
		foreach ($this->positions as $position) {
			$this->positionsTable .= '<tr><td>'.$position->symbol.'</td><td>'.$position->qty.'шт.</td><td>'.$position->note.'</td></tr>';
		}
		$this->positionsTable .= '</table>';
		return $this;
	}
	
	public function convertState()
	{
		$this->convertState = OrderState::convert($this->state);
		return $this;
	}
	
	public function getActions()
	{
		if ($this->state < OrderState::WORK) return $this;
		$items = OrderAction::getIdActionsByIdOrder($this->id);
		foreach ($items as $item) {
			$action = new OrderAction($item->id);
			$action->getProduct()->convertState()->setBgState()->isStates();
			$this->actions[] = $action;
		}
		return $this;
	}
	
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
		$items = OrderAction::getProductsOrder($this->id);
		if (empty($items)) return;
		foreach ($items as $item) {
			$product = new Product($item->id_prod);
			$this->products[] = $product;
		}
		return $this;
	}
	
	public function convertRating()
	{
		$this->convertRating = self::convertRatingStatic($this->rating);
		return $this;
	}
	
	public function checkReady()
	{
		self::checkReadyStatic($this->id);
		return $this;
	}
	
	public function editState($state)
	{
		$params = ['state' => $state, 'id_order' => $this->id];
		self::setStateModel($params);
		return $this;
	}
    
	
}






















