<?php

trait OrderActionConvert {
	
	public function convertState()
	{
		$this->stateString = $this->setStateString();
		$this->stateBg = $this->setStateBg();
		return $this;
	}
	
	public function setStateString()
	{
		switch ($this->state) {
			case OrderActionState::WAITING : return "Отложена";
			case OrderActionState::PLANED : return "Запланирована";
			case OrderActionState::PROGRESS : return "Выполняется";
			case OrderActionState::STOPPED : return "Остановлена";
			case OrderActionState::ENDED : return "Выполнена";
			default: return "Не известное состояние";
		}
	}
	
	public function setStateBg()
	{
		switch ($this->state) {
			case OrderActionState::WAITING : return "#FFE4B5";
			case OrderActionState::PLANED : return "#F0FFF0";
			case OrderActionState::PROGRESS : return "yellow";
			case OrderActionState::STOPPED : return "red";
			case OrderActionState::ENDED : return "green";
			default: return "#000";
		}
	}
	
	public function setBgTerminalBox()
	{
		if ($this->rating != Order::RATING_REGULAR && $this->state == OrderActionState::PLANED) $this->bgTerminalBox =  self::BG_TERMINAL_BOX_PRIORITY;
		else if ($this->state == OrderActionState::PROGRESS) $this->bgTerminalBox = self::BG_TERMINAL_BOX_PROGRESS;
		else if ($this->state == OrderActionState::STOPPED) $this->bgTerminalBox =  self::BG_TERMINAL_BOX_STOPPED;
		else $this->bgTerminalBox = self::BG_TERMINAL_BOX_PLAN;
		return $this;
	}
	



}