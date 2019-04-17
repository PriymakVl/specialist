<?php

trait OrderParam {

	use Param;
	
	public function addDataParam($keys)
	{
		$params = self::selectParams($keys);
		$params['date_exec'] = Date::convertStringToTime($params['date_exec']);
		$params['date_reg'] = time();
		$params['state'] = OrderState::REGISTERED;
		return $params;
	}
	
	public function editDataParam() 
	{
		$params = self::selectParams(['type', 'note', 'rating', 'id_order']);
		$params['date_exec'] = Date::convertStringToTime($this->post->date_exec);
		$params['symbol'] = trim($this->post->symbol);
		return $params;
	}
	
	
	public function getByStateAndTypeParam()
	{
		$params['type'] = $this->getTypeParam();
		$parems['state'] = $this->getStateParam();
		$params['status'] = STATUS_ACTIVE;
	}
	
	public function getTypeParam()
	{
		$user = (new User)->setData($this->session->id_user)->setProperties();
		if ($this->get->type && $this->get->type != self::TYPE_ALL) return $this->get->type;
		else if ($this->get->type == self::TYPE_ALL) return false;
		else if ($user->defaultTypeOrder) return $user->defaultTypeOrder;
		return self::TYPE_CYLINDER;
	}
	
	public function getStateParam()
	{
		$user = (new User)->setData($this->session->id_user)->setProperties();
		if ($this->get->state && $this->get->state != OrderState::ALL) return $this->get->state;
		else if ($this->get->state == OrderState::ALL) return false;
		else if ($user->defaultStateOrder) return $user->defaultStateOrder;
		return OrderState::REGISTERED;
	}
	
}