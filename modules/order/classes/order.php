<?php

class Order extends OrderBase {
	
	use OrderEdit, OrderContentGet, OrderContentAdd, OrderGet, OrderModel, OrderCheck, OrderConvert, OrderTime;
	
	public function addData()
	{
		$id_order = $this->addDataModel();
		return (new self)->setData($id_order);
	}
	
	public function setActive()
	{
		$this->setSession('id_order_active', $this->id);
		return $this;
	}
	
	public function delete()
	{
		parent::delete();
		// self::deleteStatic($this->id);
		return $this;
	}
	
	public function checkReady()
	{
		$this->checkReadyTotal();
		return $this;
	}
	
	public function search()
	{
		$items = $this->searchBySymbol();
		if ($items) return ObjectHelper::createArray($items, 'Order', ['setData', 'getPositions', 'getPositionsTable']);
	}
    
	
}























