<?php

trait ProductExtract {

	public function extractProduct($position)
	{
		$symbol = $this->extractSymbol($position);
		if (!$symbol) return false;
		$items = $this->getAllBySymbol($symbol);
		if ($items) return (new Product)->setData($items[0]);
	}
	
	public function extractSymbol($position)
	{
		if (strpos($position->symbol, 'x') === false) return false;
		return explode('x', $position->symbol)[0];
	}

}