<?php

trait OrderActionDelete {

	public function deleteFromProducts($products)
	{
		foreach ($products as $product) {
			$actions = $this->getForProduct($product->id);
			if ($actions) $this->deleteActions($actions);
		}
	}
	
	public function deleteActions($actions)
	{
		foreach ($actions as $action) {
			$action->delete();
		}
	}
	
	public function deleteAndEditState()
	{
		parent::delete();
		$this->editStateProduct($this->id_prod)->editStateOrder($this->id_order);
		return $this;
	}

}