<?php

class OrderAction extends OrderActionBase {
	
	use OrderActionModel, OrderActionSelect, OrderActionMainState, OrderActionConvert, OrderActionTerminal, OrderActionAdd, OrderActionGet, OrderActionDelete;
	use OrderActionTime;
	
	public function getProduct()
	{
		$data = (new OrderProduct)->getData($this->id_prod);
		if ($data && $data->status == STATUS_ACTIVE) $this->product = (new OrderProduct)->setData($data);
		return $this;
	}
	
	public function getOrder()
	{
		$data = (new Order)->getData($this->id_order);
		if ($data && $data->status == STATUS_ACTIVE) $this->order = (new Order)->setData($data);
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























