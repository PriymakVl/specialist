<?php
require_once('order_product_action_static.php');

class OrderAction extends OrderActionStatic {

	public $product;
	public $order;
	public $convertState;
	public $bgTerminalBox;
	public $action;//объект операции обработки
	
	const BG_TERMINAL_BOX_PLAN = 'yellow';
	const BG_TERMINAL_BOX_PROGRESS = 'green';
	const BG_TERMINAL_BOX_STOPPED = 'red';
	
	public function __construct($id)
    {
        $this->tableName = 'order_product_actions';
        parent::__construct($id);
    }
	
	public function getProduct()
	{
		$this->product = new Product($this->id_prod);
		return $this;
	}
	
	public function getOrder()
	{
		$this->order = new Order($this->id_order);
		return $this;
	}
	
	public function getAction()
	{
		$this->action = new Action($this->id_action);
		return $this;
	}
	
	public function convertState()
	{
		$this->convertState = self::convertStateWork($this->state);
		return $this;
	}
	
	public function setBgTerminalBox()
	{
		if ($this->state == self::STATE_WORK_PROGRESS) $this->bgTerminalBox = self::BG_TERMINAL_BOX_PROGRESS;
		else if ($this->state == self::STATE_WORK_STOPPED) $this->bgTerminalBox =  self::BG_TERMINAL_BOX_STOPPED;
		else $this->bgTerminalBox = self::BG_TERMINAL_BOX_PLAN;
		return $this;
	}
	
	
	
	
	
}























