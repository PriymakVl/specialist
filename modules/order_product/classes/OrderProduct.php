<?php

class OrderProduct extends OrderProductBase {
	
	use OrderProductTotal, OrderProductConvert, OrderProductSpecification;
	
	public function __construct($id = false)
	{
		$this->tableName = 'order_products';
		parent::__construct($id);
		$this->message->section = 'order_product';
	}

	public function getOptions()
	{
		$this->options = (new Product)->getData($this->id_prod);
		return $this;
	}
	
	public function addProduct()
	{
		$params = ['id_prod' => $this->get->id_prod, 'qty' => $this->get->qty, 'id_parent' => self::ID_MAIN_PARENT, 'state' => self::STATE_WAITING];
		$params['id_order'] = $this->session->id_order_active;
		$id = $this->addOne($params);
		$this->getData($id);
		return $this;
	}
	//for convert specification
	public function setTypeProduct()
	{
		$this->type = $this->options->type;
		return $this;
	}
	
	public function edit()
	{
		$this->editModel();
		return $this;
	}
	
	public function getParent()
	{
		if ($this->id_parent) $this->parent = (new self)->setData($this->getParentData())->getOptions(); 
		return $this;
	}
	
	public function getOrder()
	{
		$this->order = (new Order)->getData($this->id_order);
		return $this;
	}
	
	
	
	
	
	
}























