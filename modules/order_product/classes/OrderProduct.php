<?php

class OrderProduct extends OrderProductBase {
	
	use OrderProductStatic, OrderProductConvert, OrderProductSpecification;
	
	public function __construct($id = false)
	{
		$this->tableName = 'order_products';
		parent::__construct($id);
		$this->message->section = 'order_product';
	}

	public function getOptions()
	{
		$this->options = Product::getOptions($this->id_prod);
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
	
	public function edit()
	{
		$this->editModel();
		return $this;
	}
	
	
	
	
	
}























