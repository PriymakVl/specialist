<?php

class OrderProduct extends OrderProductBase {
	
	use OrderProductTotal, OrderProductConvert, OrderProductSpecification, OrderProductState;
	
	public function __construct($id = false)
	{
		$this->tableName = 'order_products';
		parent::__construct($id);
		$this->message->section = 'order_product';
	}
	
	public function addProduct()
	{
		$params = ['id_prod' => $this->get->id_prod, 'qty' => $this->get->qty, 'id_parent' => self::ID_MAIN_PARENT, 'state' => self::STATE_WAITING];
		$params['id_order'] = $this->session->id_order_active;
		$id = $this->addOne($params);
		return $this->setData($id);
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
	
	public function deleteAll()
	{
		$this->getSpecificationAll()->deleteSpecificationAll()->delete();
		$products = $this->specificationAll ? array_merge([$this], $this->specificationAll) : [$this];
		(new OrderAction)->deleteFromProducts($products);
		return $this;
	}
	
	public function setStateOrder()
	{
		(new OrderState)->check($this->id_order);
		return $this;
	}
	
	public function editState($order)
	{
		if ($order->state == OrderState::PREPARATION) return $this->setStatePreparation($order);
	}
	
	public function getActions()
	{
		$this->actions = (new OrderAction)->getForProduct($this);
		return $this;
	}
	
	
	
	
	
	
	
}























