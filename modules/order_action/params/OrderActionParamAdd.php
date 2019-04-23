<?php 

trait OrderActionParamAdd {

	public function addDataModelParams($action, $product) {
		$id_order = $this->get->id_order ? $this->get->id_order : $this->session->id_order_active;
		$order = new Order($id_order);
		$params['id_order'] = $order->id;
		$params['type_order'] = $order->type;
		
		$params['id_prod'] = $product->id;
		$params['qty'] = $product->qty;
		$params['date_exec'] = $product->date_exec;
		
		
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
		$params = self::selectParams(['id_prod', 'id_order', 'price', 'number', 'time_prepar', 'time_prod', 'note', 'qty', 'date_exec']);
		$params['name'] = trim(self::getParam('name'));
		$params['state'] = OrderActionState::WAITING;
		$params['rating'] = self::RATING_DEFAULT;
		
		$order = new Order($this->get->id_order);
		$params['type_order'] = $order->type;
		return $params;
	}
	
	public function addForOrderModelParams()
	{
		$params = self::selectParams(['id_order', 'price', 'number', 'time_prepar', 'time_prod', 'note', 'qty', 'date_exec']);
		$params['name'] = trim(self::getParam('name'));
		$params['state'] = OrderActionState::WAITING;
		$params['rating'] = self::RATING_DEFAULT;
		$params['id_prod'] = 0;
		$order = new Order($this->get->id_order);
		$params['type_order'] = $order->type;
		return $params;
	}

}