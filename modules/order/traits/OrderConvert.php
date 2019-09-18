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
		if ($this->productsMain) $this->productsTable = (new OrderProduct)->convertProductsToTable($this->productsMain);
		return $this;
	}

	public function setTypeString()
	{
		if ($this->type == self::TYPE_CYLINDER) return 'Пневмо';
		if ($this->type == self::TYPE_CAR_NUMBER) return 'Пресса и накатки';
		return 'Не определен';
	}
	
	

}