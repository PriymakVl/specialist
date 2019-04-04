<?php

trait OrderActionConvert {

	public function convertStateWork($state)
	{
		switch ($state) {
			case OrderActionState::WAITING : return "Ожидает окончания другой операции";
			case OrderActionState::PLANED : return "Запланирована";
			case OrderActionState::PROGRESS : return "В работе";
			case OrderActionState::STOPPED : return "Остановлена";
			case OrderActionState::ENDED : return "Выполнена";
			default: return "Не известное состояние";
		}
	}
	
	public function getBgStateWork($state)
	{
		switch ($state) {
			case OrderActionState::WAITING : return "orange";
			case OrderActionState::PLANED : return "#fff";
			case OrderActionState::PROGRESS : return "yellow";
			case OrderActionState::STOPPED : return "red";
			case OrderActionState::ENDED : return "green";
			default: return "#000";
		}
	}
	
	public function convertState()
	{
		$this->convertState = OrderActionStatic::convertStateWork($this->state);
		return $this;
	}
	
	public function setBgState()
	{
		$this->bgState = OrderActionStatic::getBgStateWork($this->state);
		return $this;
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