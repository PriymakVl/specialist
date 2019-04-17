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
		if ($this->productsAll) $this->editStateProducts();
		if ($this->actions) $this->editStateActions();
		$this->setState($this->post->state ? $this->post->state : $this->get->state);
		return $this;
	}
	
	public function editStateProducts()
	{
		foreach ($this->productsAll as $product) {
			if ($product->state == OrderProduct::STATE_ENDED) continue;
			$state = (new OrderProduct)->determineStateByStateOrder($this->post->state);
			$product->setState($state);
		}
	}
	
	public function editStateActions()
	{
		foreach ($this->actions as $action) {
			if ($action->state == OrderActionState::ENDED) continue;
			$state = (new OrderAction)->determineStateByStateOrder($this->post->state);
			$action->setState($state);
		}
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