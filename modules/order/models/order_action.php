<?php
require_once('order_action_static.php');

class OrderAction extends OrderActionStatic {

	public $product;
	public $order;
	public $convertState;
	public $action;//объект операции обработки
	public $bgState;
	
	public function __construct($id)
    {
        $this->tableName = 'order_actions';
        parent::__construct($id);
    }
	
	public function getProduct()
	{
		$this->product = new Product($this->id_prod);
		return $this;
	}
	
	public function getAction()
	{
		$this->action = new Action($this->id_action);
		return $this;
	}
	
	public function convertState()
	{
		$this->convertState = ParamOrderAction::convertStateWork($this->state);
		return $this;
	}
	
	public function getBgState()
	{
		$this->bgState = ParamOrderAction::getBgStateWork($this->state);
		return $this;
	}
	


	
	
}























