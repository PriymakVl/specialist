<?php

trait OrderProductEdit {

	public function edit()
	{
		$this->editModel();
		$this->editStateUpAndDown($this->post->state);
		if ($this->qty != $this->post->qty) $this->editQuantity($this->post->qty);
		return $this;
	}
	
	public function editRating()
	{
		$this->setRating($this->get->rating);
		$this->editRatingActions();
		return $this;
	}
	
	public function editRatingActions()
	{
		if (!$this->actions) return;
		foreach ($this->actions as $action) {
			$action->setRating($this->get->rating);
		}
	}

	public function editQuantity($qty) 
	{
		$this->getActions()->getSpecificationAll();
		$this->editQuantityActions($qty);
		$this->editQuantitySpecification($qty);
		$this->updateQuantityModel($qty);
		return $this;
	}

	private function editQuantityActions($qty)
	{
		if (!$this->actions) return;
		foreach ($this->actions as $action) {
			$action->updateQuantityModel($qty);
		}
	}

	private function editQuantitySpecification($qty)
	{
		if (!$this->specificationAll) return;
		if ($qty === 0) return;
		foreach ($this->specificationAll as $product)
		{
			$new_qty = $this->getQtyForSpecificationItem($qty, $product->qty);
			$product->updateQuantityModel($new_qty);
			$product->getActions()->editQuantityActions($new_qty);
		}
	}

	private function getQtyForSpecificationItem($new_qty, $specif_item_qty)
	{
		if ($this->qty == 1) return $new_qty * $specif_item_qty;
		else return ($specif_item_qty / $this->qty) * $new_qty;
	}
}