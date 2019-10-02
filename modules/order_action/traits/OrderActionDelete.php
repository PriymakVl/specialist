<?php

trait OrderActionDelete {

	public function deleteFromProducts($products)
	{
		foreach ($products as $product) {
			$actions = $this->getForProduct($product->id);
			if ($actions) $this->deleteActions($actions);
		}
	}
	
	public function deleteList($ids)
	{
		$items = (new self)->selectByIds(substr($ids,0,-1));
		if (!$items) return $this;
		foreach ($items as $data) {
			(new self)->setData($data)->deleteAndEditState();
		}
		return $this;
	}

	public function deleteActions($actions)
	{
		foreach ($actions as $action)
		{
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