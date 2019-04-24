<?php

class OrderAction extends OrderActionBase {
	
	use OrderActionModel, OrderActionSelectItems, OrderActionMainState, OrderActionConvert, OrderActionTerminal, OrderActionAdd, OrderActionGet, OrderActionDelete;
	use OrderActionDateReady;
	
	public function getProduct()
	{
		if ($this->id_prod) $this->product = (new OrderProduct)->setData($this->id_prod);
		return $this;
	}
	
	public function getOrder()
	{
		$this->order = new Order($this->id_order);
		return $this;
	}
	
	public function edit()
	{
		$this->updateModel();
		$this->editStateProduct();
		return $this;
	}
	
	
	
	
}























