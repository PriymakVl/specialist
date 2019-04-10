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
			debug($product);
			if ($product) {
				$id_prod = $this->addDataModel($product, self::ID_MAIN_PARENT);
				$position->setIdProductModel($id_prod);
			}
		}
	}

}