<?php

class OrderAction extends OrderActionBase {
	
	use OrderActionModel, OrderActionSelect, OrderActionMainState, OrderActionConvert, OrderActionTerminal, OrderActionAdd, OrderActionGet, OrderActionDelete;
	use OrderActionTime;
	
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
	
	public function getWorker()
	{
		if ($this->id_worker) $this->worker = new Worker($this->id_worker);
		return $this;
	}
	
	public function edit()
	{
		$this->updateModel();
		$this->editStateProduct();
		return $this;
	}
	
	
	
	
}























