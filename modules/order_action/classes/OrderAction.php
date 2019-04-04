<?php

class OrderAction extends OrderActionBase {
	
	use OrderActionTotal, OrderActionModel, OrderActionParam, OrderActionModelState, OrderActionConvert;
	//, OrderActionTime, , OrderActionTerminal, 
	
	public function __construct($id = false)
    {
        $this->tableName = 'order_actions';
        parent::__construct($id);
		$this->message->section = 'order_action';
    }
	
	public function getProduct()
	{
		$this->product = (new Product)->setData($this->id_prod)->getOptions();
		return $this;
	}
	
		public function getOrder()
	{
		$this->order = new Order($this->id_order);
		return $this;
	}

	public function checkReadyOrder()
	{
		Order::CheckReadyStatic($this->id_order);
		return $this;
	}
	
	
	
	
}























