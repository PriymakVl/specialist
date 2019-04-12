<?php

trait OrderConvert {

	public function convertProperties()
	{
		$this->ratingString = $this->setRatingString();
		$this->stateString = (new OrderState)->setStateString($this->state);
		$this->stateBg = (new OrderState)->setStateBg($this->state);
		return $this;
	}
	
	public function setRatingString()
	{
		switch($this->rating) {
			case self::RATING_REGULAR: return 'Обычный';
			case self::RATING_IMPORTANT: return 'Важный';
			case self::RATING_PRIORITY: return 'Первоочередной';
		}
	}
	
	public function getPositionsTable()
	{
		if ($this->positions) $this->positionsTable = (new OrderPosition)->convertPositionsToTable($this->positions);
		return $this;
	}
	
	public function getProductsTable()
	{
		if ($this->products) $this->productsTable = (new OrderProduct)->convertProductsToTable($this->products);
		return $this;
	}
	
	

}