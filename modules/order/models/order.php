<?php
require_once ('order_static.php');

class Order extends OrderStatic {

    public $content;
	public $positionsTable;
	public $positions;
	public $convertState;
	public $actions;
	public $actionsUnplan;
	public $products;

    public function __construct($order_id)
    {
        $this->tableName = 'orders';
        parent::__construct($order_id);
		$this->message->section = 'order';
    }

    public function getContent()
    {
        $this->content = OrderContent::get($this->id);
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
		$this->positions = OrderPositions::get($this->id);
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
		if ($this->state < OrderState::WORK) return;
		$items = OrderActionUnplan::getByIdOrder($this->id);
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
    
	
}























