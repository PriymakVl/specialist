<?php

trait OrderProductAdd {

	public function addProductBase()
	{
		$product = (new Product)->setData($this->get->id_prod);
		$params = $this->getParamsFromProduct($product, self::ID_MAIN_ORDER);
		$id = $this->addDataModel($params);
		return $this->setData($id);
	}

	public function addProductPosition()
	{
		$params = $this->getParamsFromPosition();
		$id = $this->addDataModel($params);
		return $this->setData($id);
	}
	
	public function addProductForm()
	{
		$params = $this->getParamsFromForm();
		$id = $this->addDataModel($params);
		return $this->setData($id);
	}
	
	//when add products from base products automatic
	public function addProductsByPositions($positions)
	{
		foreach ($positions as $position) {
			$product = (new Product)->extractProduct($position);
			if ($product) {
				//for specification
				$_GET['qty'] = $position->qty; 
				//for product
				$this->get->qty = $position->qty;
				$params = $this->getParamsFromProduct($product, self::ID_MAIN_ORDER);
				$id_prod = $this->addDataModel($params);
				$order_product = (new self)->setData($id_prod)->addSpecification($product->id)->getSpecificationAll();
				(new OrderAction)->addForProductBase($order_product)->addForSpecification($order_product->specificationAll);
			}
		}
	}

}