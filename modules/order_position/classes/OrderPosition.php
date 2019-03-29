<?php

class OrderPosition extends Model {
	
	use OrderPositionTotal, OrderPositionConvert;
	
	public $order;
	
	public function __construct($id_position = false)
	{
		parent::__construct($id_position);
		$this->message->section = 'order_position';
		$this->tableName = 'order_positions';
	}
	
	public function addData()
	{
        $id_position = $this->addDataModel();
		return (new self)->setData($id_position);
	}
	
	public function editData()
	{
		$this->editDataModel();
		return $this;
	}
	
	public function getOrder()
	{
		$this->order = (new Order)->getData($this->id_order);
		return $this;
	}
	
	
	
}























