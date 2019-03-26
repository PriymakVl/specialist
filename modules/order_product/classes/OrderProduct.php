<?php

class OrderProduct {
	
	use OrderProductStatic;
	
	public $options;
	public $this->specification;

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
	
	
	
	
	
	
	
	
	

	
	

	
	
}























