<?php

trait OrderActionStateConvert {

	public function setName()
	{
		switch ($this->state) {
			case self::PLANED: $this->name = 'Операция запланирована'; break;
			case self::PROGRESS: $this->name = 'Операция выполняется'; break;
			case self::STOPPED: $this->name = 'Операция остановлена'; break;
			case self::ENDED: $this->name = 'Операция окончена'; break;
		}
		return $this;
	}
	
	public function setBg()
	{
		switch ($this->state) {
			case self::PLANED: $this->bg = '#fff'; break;
			case self::PROGRESS: $this->bg = 'yellow'; break;
			case self::STOPPED: $this->bg = 'red'; break;
			case self::ENDED: $this->bg = 'green'; break;
		}
		return $this;
	}


}