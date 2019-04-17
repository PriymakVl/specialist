<?php

trait OrderActionParam {

	// use Param;
	
	public function addDataModelParams($action, $product) {
		$id_order = $this->get->id_order ? $this->get->id_order : $this->session->id_order_active;
		$order = new Order($id_order);
		$params['id_order'] = $order->id;
		$params['type_order'] = $order->type;
		
		$params['id_prod'] = $product->id;
		$params['qty'] = $product->qty;
		
		
		$params['name'] = $action->name; //for get options action
		$params['note'] = $action->note;
		$params['time_prepar'] = $action->time_prepar;//time preparation
		$params['time_prod'] = $action->time_prod; //time production
		$params['number'] = $action->number;
		$params['price'] = $action->price;
		
		$params['state'] = OrderActionState::WAITING;
		$params['rating'] = self::RATING_DEFAULT;
		return $params;
	}
	
	public function addForProductModelParams()
	{
		$params = self::selectParams(['id_prod', 'id_order', 'price', 'number', 'time_prepar', 'time_prod', 'note', 'qty']);
		$params['name'] = trim(self::getParam('name'));
		$params['state'] = OrderActionState::WAITING;
		$params['rating'] = self::RATING_DEFAULT;
		
		$order = new Order($this->get->id_order);
		$params['type_order'] = $order->type;
		return $params;
	}
	
	public function addForOrderModelParams()
	{
		$params = self::selectParams(['id_order', 'price', 'number', 'time_prepar', 'time_prod', 'note', 'qty']);
		$params['name'] = trim(self::getParam('name'));
		$params['state'] = OrderActionState::WAITING;
		$params['rating'] = self::RATING_DEFAULT;
		$params['id_prod'] = 0;
		$order = new Order($this->get->id_order);
		$params['type_order'] = $order->type;
		return $params;
	}
	
	public function editModelParams()
	{
		$params = self::selectParams(['id_action', 'price', 'number', 'time_prepar', 'time_prod', 'note', 'qty', 'state', 'rating']);
		$params['name'] = trim(self::getParam('name'));
		return $params;
	}
	
	// public function getAllNotStateEndedParam()
	// {
		// $params = self::selectParams(['type_order', 'status']);
		// $params['state'] = OrderActionState::ENDED;
		// return $params;
	// }
	
	private function getTypeOrderParam()
	{
		$user = (new User)->setData($this->session->id_user)->setProperties();
		if ($this->get->type_order) return $this->get->type_order;
		else if ($user->defaultTypeOrder) return $user->defaultTypeOrder;
		return Order::TYPE_CYLINDER;
	}
	
	private function getActionParam()
	{
		$worker = (new Worker)->setData($this->session->id_user)->setProperties();
		if ($this->get->action == 'all') return false;
		else if ($this->get->action) return $this->get->action;
		else if ($worker->defaultAction) return $worker->defaultAction;
		return false;
	}
	
	private function getIdOrderParam()
	{
		if ($this->get->id_order == 'all') return false;
		if ($this->get->id_order) return $this->get->id_order;
		return false;
	}
	
}























