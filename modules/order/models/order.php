<?php
require_once ('order_static.php');

class Order extends OrderStatic {

    public $content;
	public $positionsTable;
	public $positions;
	public $convertState;

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
		//OrderProducts::add($products, $this);
		OrderProductAction::add($products, $this);
		$this->setState(OrderState::WORK);
		//todo для учета статистики добавить состояние в OrderState
		//$products = $this->getListOfProduct();
	}
	
	public function toMade()
	{
		OrderProducts::madeOrder($this->id);
		$this->setState(OrderState::MADE);
	}
	
	public function setStateMade()
	{
		$products = OrderProducts::getNotReady($this->id);
		if (!$products) $this->setState(OrderState::MADE);
        return $this;
	}
	
	public function getTimeManufacturingForWorker($worker)
	{
		Statistics::getTimeManufacturingOrderForWorker($this, $worker);
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
    
	
}























