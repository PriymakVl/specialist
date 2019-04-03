<?php

trait OrderProductState {

	
	
	public function setStatePreparation($order)
	{
		if ($order->products) return $this;
		$products = (new OrderProductExtract)->getProducts($order);
		if ($products) $this->addProductList($products);//->addActionList($order->id);
		// if ($symbols) return $this->
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