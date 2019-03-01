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
    }

    public function getContent()
    {
        $this->content = OrderContent::get($this->id);
        return $this;
    }
	
	public function toPreparation()
	{
		if (!$this->positions) return;
		OrderContent::addByPositionsOrder($this->positions);
		$this->setState(OrderState::PREPARATION);
	}
	
	public function toWork()
	{	
		$this->getContent();
		$products = OrderExtractProducts::get($this->content);
		OrderAction::add($products, $this);
		$this->setState(OrderState::WORK);
		//todo для учета статистики добавить состояние в OrderState
		//$products = $this->getListOfProduct();
	}
	
	public function toMade()
	{
		OrderAction::setStateMadeForAllActionsOrder($this->id);
		$this->setState(OrderState::MADE);
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
		if ($this->state < OrderState::WORK) return;
		$items = OrderAction::getIdActionsByIdOrder($this->id);
		foreach ($items as $item) {
			$action = new OrderAction($item->id);
			$action->getProduct()->getAction()->convertState()->getBgState();
			$this->actions[] = $action;
		}
		return $this;
	}
	
	public function getActionsUnplan()
	{
		if ($this->state < OrderState::WORK) return;
		$this->actionsUnplan = OrderActionUnplan::getByIdOrder($this->id);
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























