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
			case self::STATE_WAITING : return "Не выдан";
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
			case self::STATE_PROGRESS : return "yellow";
			case self::STATE_STOPPED : return "red";
			case self::STATE_ENDED : return "green";
			default: return "#000";
		}
	}

}