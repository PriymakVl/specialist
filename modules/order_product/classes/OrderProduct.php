<?php

class OrderProduct {
	
	use OrderProductStatic;
	
	public $options;
	public $specification;
	
	const ID_MAIN_PARENT = 0;
	
	public function __construct($id = false)
	{
		$this->table = 'order_products';
		parent::__construct($id);
		$this->message->section = 'order_product';
	}

	public function getOptions()
	{
		$this->options = Product::getOptions($this->id_prod);
		return $this;
	}
	
	public function getSpecification()
	{
		$this->specification = self::getSpecificationModel($this->id);
		return $this;
	}
	
	public function convertSpecification()
	{
		$methods = ['setData', 'getOptions'];
		$this->specification = ObjectHelper::createArray($this->specification, 'OrderProduct', $methods);
		return $this;
	}
	
	public function addProduct()
	{
		$params = ['id_prod' => $this->get->id_prod, qty => $this->get->qty, 'id_parent' => ID_MAIN_PARENT];
		$params['id_order'] = $this->session->id_order_active;
		self::addProductModel($params);
		return $this;
	}
	
	public function addProductSpecification($specification)
	{
		if ($specification) self::addProductSpecificationTrait($specification);
		return $this;
	}
	
	
}























