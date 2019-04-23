<?php

trait OrderEdit {

	public function edit()
	{
		$this->editData();
		return $this;
	}
	
	public function editState()
	{
		$state = $this->get->state ? $this->get->state : $this->post->state;
		if ($state == $this->state) return $this;
		if ($this->state == OrderState::REGISTERED && $this->post->state == OrderState::PREPARATION && $this->positions) return $this->editStateWithAddProducts($state);
		if ($this->productsAll) $this->editStateProducts($state);
		$this->setState($state);
		return $this;
	}
	//when pass in preparation from registration
	private function editStateWithAddProducts($state)
	{
		$this->addProductsByPositions();
		$this->setState($state);
		return $this;
	}
	
	public function editStateProducts($state)
	{
		foreach ($this->productsAll as $product) {
			if ($product->state == OrderProduct::STATE_ENDED) continue;
			$state = (new OrderProduct)->determineStateByStateOrder($state);
			$product->editStateDown($state);
		}
	}
	
	public function editRating()
	{
		$this->setRating($this->get->rating);
		$this->getProductsAll();
		$this->editRatingProducts();
		return $this;
	}
	
	private function editRatingProducts()
	{
		if (!$this->productsAll) return;
		foreach ($this->productsAll as $product) {
			$product->editRating();
		}
	}

}