<?php

trait OrderActionAdd {

	private function addDataModel($action, $product)
	{
		$params = $this->addDataModelParams($action, $product);
        return $this->addActionModel($params);
	}
	
	public function addForProduct()
	{
		$params = $this->addForProductModelParams();
		$this->addActionModel($params);
		return $this;
	}
	
	public function addForOrder()
	{
		$params = $this->addForOrderModelParams();
		$this->addActionModel($params);
		return $this;
	}
	
	public function addForProductBase($product)
	{
		$actions = (new ProductAction)->getAllBySymbolProductModel($product->symbol);
		if ($actions) $this->addActions($actions, $product);
		return $this;
	}
	
	public function addForSpecification($specification)
	{
		foreach ($specification as $product) {
				$this->addForProductBase($product);
		}
	}
	
	private function addActions($actions, $product)
	{
		foreach ($actions as $action) {
			$this->addDataModel($action, $product);
		}
	}

}