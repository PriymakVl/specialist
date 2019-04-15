<?php

class OrderActionState extends OrderActionStateBase {
	
    use OrderActionStateModel;
	
	public function setDuration($states)
	{
		for ($i = 0; $i < count($states); $i++) {
			if ($states[$i]->id != $this->id) continue;
			if (count($states) == 1) $this->duration = Date::convertTimeToMinutes(time() - $states[0]->time); //только один замер
			else if (empty($states[$i + 1]) && $states[$i]->state != OrderActionState::ENDED) $this->duration =  Date::convertTimeToMinutes(time() - $states[$i]->time);
			else if ($states[$i]->state == OrderActionState::ENDED && empty($states[$i + 1])) $this->duration = false;//операция выполнена
			else $this->duration = self::countDuration($states, $i);
		}
		return $this;
	}
	
	private function countDuration($states, $index)
	{
		if (empty($states[$index + 1])) return false;
		$duration = $states[$index + 1]->time - $states[$index]->time;
		return Date::convertTimeToMinutes($duration);
	}
	
	
	
}























