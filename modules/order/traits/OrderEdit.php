<?php

trait OrderEdit {

	public function edit()
	{
		$this->editData();
		return $this;
	}
	
	public function editState()
	{
		if ($this->post->state == $this->state) return $this;
		if ($this->state == OrderState::REGISTERED && $this->post->state == OrderState::PREPARATION && $this->positions) $this->addProductsByPositions();
		if ($this->products) (new OrderProduct)->setStateAsInOrder($this->id, $this->post->state);
		if ($this->actions) (new OrderAction)->setStateAsInOrder($this->id, $this->post->state);
		$this->setState($this->post->state ? $this->post->state : $this->get->state);
		return $this;
	}
	
	public function editRating()
	{
		$this->setRating($this->get->rating);
		$this->getAllProductsNotStateEnded();
		$this->editRatingProducts();
		return $this;
	}
	
	private function editRatingProducts()
	{
		if (!$this->productsNotReady) return;
		foreach ($this->productsNotReady as $product) {
			$product->editRating();
		}
	}

}