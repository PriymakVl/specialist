<?php

trait OrderProductAdd {

	public function addProductBase()
	{
		$product = (new Product)->setData($this->get->id_prod);
		$id = $this->addDataModel($product, self::ID_MAIN_PARENT);
		return $this->setData($id);
	}
	
	public function addProductForm()
	{
		$id = $this->addFormModel();
		return $this->setData($id);
	}
	
	public function addProductsByPositions($positions)
	{
		foreach ($positions as $position) {
			$product = (new Product)->extractProduct($position);
			if ($product) {
				$_GET['qty'] = $position->qty; $this->get->qty = $position->qty;
				$id_prod = $this->addDataModel($product, self::ID_MAIN_PARENT);
				$order_product = (new self)->setData($id_prod)->addSpecification($product->id)->getSpecificationAll();
				(new OrderAction)->addForProductBase($order_product)->addForSpecification($order_product->specificationAll);
				(new OrderPosition)->setData($position)->setIdProductModel($id_prod);
			}
		}
	}
	
	public function addProductList($products) 
	{
		foreach ($products as $product) {
			$params = ['id_prod' => $product->id, 'qty' => $product->qty, 'id_parent' => self::ID_MAIN_PARENT, 'state' => self::STATE_WAITING, 'id_order' =>  $product->id_order];
			$id_parent = $this->addOne($params);
			(new self)->setData($id_parent)->addSpecification($product->id);
		}
		return $this;
	}
	
	public function addActionList($id_order)
	{
		$products = $this->getAllForOrder($id_order);
		if ($products) (new OrderAction)->addActions($products);
		return $this;
	}

}