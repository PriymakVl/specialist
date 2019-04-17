<?php

trait OrderProductConvert {

	public function convertState()
	{
		$this->stateString = $this->getStateString();
		$this->stateBg = $this->getStateBackground();
		return $this;
	}
	
	public function getStateString()
	{
		switch ($this->state) {
			case self::STATE_WAITING : return "Отложен";
			case self::STATE_PLANED : return "Запланирован";
			case self::STATE_PROGRESS : return "Обрабатывается";
			case self::STATE_STOPPED : return "Остановлен";
			case self::STATE_ENDED : return "Изготовлен";
			default: return "Не известное состояние";
		}
	}
	
	public function getStateBackground()
	{
		switch ($this->state) {
			case self::STATE_WAITING : return "#FFE4B5";
			case self::STATE_PLANED : return "#F0FFF0";
			case self::STATE_PROGRESS : return "yellow";
			case self::STATE_STOPPED : return "red";
			case self::STATE_ENDED : return "green";
			default: return "#000";
		}
	}
	
	public function convertProductsToTable($products) 
	{
		$table = '<table>';
		foreach ($products as $product) {
			$table .= '<tr><td><a href="/order_product?id_prod='. $product->id .'">'.$product->symbol.'</a></td>';
			$table .= '<td>'. $product->name .'</td>';
			$table .= '<td>'.$product->qty.'шт.</td>';
			$table .= '</tr>';
		}
		return $table .= '</table>';
	}
	
	
	
	


}