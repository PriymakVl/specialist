<?php

trait OrderActionAdd {

	private function addDataModel($action, $product)
	{
		$params = $this->addDataParams($action, $product);
        return $this->addActionModel($params);
	}
	
	public function addForProduct()
	{
		$params = $this->addForProductParams();
		$this->addActionModel($params);
		return $this;
	}
	
	public function addForOrder()
	{
		$params = $this->addForOrderParams();
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
	
	public function addForOther()
	{
		$params = $this->addForOtherParams();
		$id = $this->addActionModel($params);
		return (new self)->setData($id);
	}
	
	private function addActions($actions, $product)
	{
		foreach ($actions as $action) {
			$this->addDataModel($action, $product);
		}
	}
	
	public function addWorker()
	{
		$this->updateIdWorkerModel();
		return $this;
	}

}