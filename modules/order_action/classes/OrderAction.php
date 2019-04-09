<?php

class OrderAction extends OrderActionBase {
	
	use OrderActionTotal, OrderActionModel, OrderActionParam, OrderActionModelState, OrderActionConvert, OrderActionModelAdd;
	//, OrderActionTime, , OrderActionTerminal, 
	
	public function __construct($id = false)
    {
        $this->tableName = 'order_actions';
        parent::__construct($id);
		$this->message->section = 'order_action';
    }
	
	public function getProduct()
	{
		$this->product = (new OrderProduct)->setData($this->id_prod);
		return $this;
	}
	
	public function getOrder()
	{
		$this->order = new Order($this->id_order);
		return $this;
	}
	
	public function checkStateProduct()
	{
		(new OrderProduct)->setData($this->id_prod)->checkState();
		return $this;
	}
	
	public function addForProduct()
	{
		$this->addForProductModel();
		return $this;
	}
	
	public function addForOrder()
	{
		$this->addFormForProductModel();
		return $this;
	}
	
	public function edit()
	{
		$this->editModel();
		return $this;
	}
	
	
	
	
}























