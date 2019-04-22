<?php

trait OrderDelete {

	public function delete()
	{
		$this->getProductsAll()->getActions()->deleteProducts()->deleteActions();
		parent::delete();
		return $this;
	}
	
	private function deleteProducts()
	{
		if (!$this->productsAll) return;
		foreach ($this->productsAll as $product) {
			$product->delete();
		}
		return $this;
	}
	
	private function deleteActions()
	{
		if (!$this->actions) return;
		foreach ($this->actions as $action) {
			$action->delete();
		}
		return $this;
	}

}