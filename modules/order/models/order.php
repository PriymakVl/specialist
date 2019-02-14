<?php
require_once ('order_static.php');

class Order extends OrderStatic {

    public $content;
	public $positionsTable;

    public function __construct($order_id)
    {
        $this->tableName = 'orders';
        parent::__construct($order_id);
        $this->convertDate();
    }

    public function getContent()
    {
        $this->content = OrderContent::get($this->id);
        return $this;
    }
	
	public function toWork()
	{	
		$content = OrderContent::get($this->id);
		$products = OrderExtractProducts::get($content);
		OrderProducts::add($products, $this);
		$this->setState(OrderState::WORK);
		//todo для учета статистики добавить состояние в OrderState
		//$products = $this->getListOfProduct();
	}
	
	public function checkReadiness()
	{
		$products = OrderProducts::getAllOnOrder($this->id);
		if (!$products) return false;
		foreach ($products as $prod) {
			if ($prod->stateWork != self::STATE_WORK_END) $not_ready[]= $prod; 
		}
		if (empty($not_ready)) return true;
		return false;
	}
	
	public function getTimeManufacturingForWorker($worker)
	{
		Statistics::getTimeManufacturingOrderForWorker($this, $worker);
	}
	
	public function convertPositions()
	{
		$this->positions = unserialize($this->positions);
		return $this;
	}
	
	public function getPositionsTable()
	{
		if (!$this->positions) return;
		$this->positionsTable = '<table>';
		foreach ($this->positions as $position) {
			if (!$position['symbol']) break;
			$this->positionsTable .= '<tr><td>'.$position['symbol'].'</td><td>'.$position['qty'].'шт.</td><td>'.$position['note'].'</td></tr>';
		}
		$this->positionsTable .= '</table>';
		return $this;
	}
    
	
}























