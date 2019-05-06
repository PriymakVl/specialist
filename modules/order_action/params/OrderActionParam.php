<?php

trait OrderActionParam {

	use OrderActionParamAdd;
	
	public function updateModelParams()
	{
		$params = self::selectParams(['id_action', 'price', 'number', 'time_prepar', 'time_prod', 'note', 'qty', 'state', 'rating']);
		$params['name'] = trim(self::getParam('name'));
		return $params;
	}
	
	private function getTypeOrderParam()
	{
		$user = (new User)->setData($this->session->id_user)->setProperties();
		if ($this->get->type_order) return $this->get->type_order;
		else if ($user->defaultTypeOrder) return $user->defaultTypeOrder;
		return Order::TYPE_CYLINDER;
	}
	
	private function getActionParam()
	{
		if ($this->get->action == 'all') return false;
		else if ($this->get->action) return $this->get->action;
	}
	
	private function getIdOrderParam()
	{
		if ($this->get->id_order == 'all') return false;
		if ($this->get->id_order) return $this->get->id_order;
	}
	
	private function getByDateEndParams()
	{
		$period_start = $this->get->period_start ? Date::convertStringToTime($this->get->period_start) : time();
		$params['start'] = floor ($period_start / 86400) * 86400;
		$period_end = $this->get->period_end ?  Date::convertStringToTime($this->get->period_end) : time();
		$params['end'] = ceil ($period_end / 86400) * 86400;
		$params['status'] = STATUS_ACTIVE;
		return $params;
	}
	
}























