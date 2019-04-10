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
			case OrderActionState::WAITING : return "Не выдана";
			case OrderActionState::PLANED : return "Запланирована";
			case OrderActionState::PROGRESS : return "В работе";
			case OrderActionState::STOPPED : return "Остановлена";
			case OrderActionState::ENDED : return "Выполнена";
			default: return "Не известное состояние";
		}
	}
	
	public function setStateBg()
	{
		switch ($this->state) {
			case OrderActionState::WAITING : return "orange";
			case OrderActionState::PLANED : return "pink";
			case OrderActionState::PROGRESS : return "yellow";
			case OrderActionState::STOPPED : return "red";
			case OrderActionState::ENDED : return "green";
			default: return "#000";
		}
	}
	
	public function setBgTerminalBox()
	{
		if ($this->state == OrderActionState::PROGRESS) $this->bgTerminalBox = self::BG_TERMINAL_BOX_PROGRESS;
		else if ($this->state == OrderActionState::STOPPED) $this->bgTerminalBox =  self::BG_TERMINAL_BOX_STOPPED;
		else $this->bgTerminalBox = self::BG_TERMINAL_BOX_PLAN;
		//only plan actions
		if (get_class($this) == 'OrderAction' && $this->state == OrderActionState::PLANED) {
			if ($this->rating == Order::RATING_IMPORTANT || $this->rating == Order::RATING_PRIORITY) $this->bgTerminalBox =  self::BG_TERMINAL_BOX_PRIORITY;
		}
		return $this;
	}



}