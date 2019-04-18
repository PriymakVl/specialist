<?php

trait OrderActionDelete {

	public function deleteFromProducts($products)
	{
		foreach ($products as $product) {
			$actions = $this->getForProduct($product);
			if ($actions) $this->deleteActions($actions);
		}
	}
	
	public function deleteActions($actions)
	{
		foreach ($actions as $action) {
			$action->delete();
		}
	}

}