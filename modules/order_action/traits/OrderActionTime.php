<?php

trait OrderActionTime {

	public function countFactTimeManufact()
	{
		$params = ['id_action' => $this->id, 'status' => STATUS_ACTIVE, 'type' => 'plan'];
		$this->states = OrderActionState::getAllByIdAction($params);
		$this->timeMade = $this->countTimeManufactByTimeStates();
		return $this;
	}
	
	private function countTimeManufactByTimeStates()
	{
		$time = 0;
		if (empty($this->states) || count($this->states) == 1) return $time + 1;
		for ($i = 0; $i < count($this->states); $i++) {
			if ($this->states[$i]->state == OrderActionState::PROGRESS && isset($this->states[$i + 1])) {
				$time = $time + ($this->states[$i + 1]->time - $this->states[$i]->time);
			}
		}
		$time = Date::convertTimeToMinutes($time);
		if ($time) return $time;
		else return 1;
	}
	
	public function setTimeManufacturing($action, $product)
	{
		if (!$action->time_prod) return '';
		return ($action->time_prod * $product->orderQtyAll) + $action->time_prepar;
	}
	
	public function editTime($params)
	{
		if (empty($params['state'])) return $this;
		if ($params['state'] == OrderActionState::PROGRESS && !$this->time_start) self::setTimeStart($params);
		if ($params['state'] == OrderActionState::ENDED) self::setTimeEnd($params);
		return $this;
	}
	
	public function setTimeEnd()
	{
		$params = self::selectParams(['time', 'id_worker', 'id_action']);
		$sql = 'UPDATE `order_actions` SET `time_end` = :time, `id_worker` = :id_worker WHERE `id` = :id_action';
		return self::perform($sql, $params);
	}



}