<?php

trait ProductExtract {

	public function extractProduct($position)
	{
		$symbol = $this->extractSymbol($position);
		$items = $this->getAllBySymbolModel($symbol);
		if ($items) return (new Product)->setData($items[0]);
	}
	
	public function extractSymbol($position)
	{
		$symbol = mb_strtolower($position->symbol);
		if (strpos($symbol, 'x') === false) return $position->symbol;
		return explode('x', $symbol)[0];
	}

}