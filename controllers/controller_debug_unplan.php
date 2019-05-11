<?php

class Controller_Debug_Unplan extends Controller_Base {

	public function action_edit() 
	{
		$actions = OrderAction::getAll('order_action_unplan');
		foreach ($actions as $action) {
			$id_prod = $this->addOrderProduct($action);
			$id_action = $this->addOrderAction($action, $id_prod);
			$this->addActionStates($id_action, $action);
		}
		debug('exit');
	}
	
	public function addOrderAction($unplan, $id_prod)
	{
		// id_order, id_prod, qty, name, price, number, state, type_order, time_prepar, time_prod, note, rating, date_exec
		$order = (new Order)->getData($unplan->id_order);
		if (!$order) $date_exec = '';
		else $date_exec = $order->date_exec ? $order->date_exec : '';
		
		$params['id_order'] = $unplan->id_order;
		$params['id_prod'] = $id_prod;
		$params['qty'] = $unplan->qty;
		$params['name'] = $unplan->action_name;
		$params['price'] = '';
		$params['number'] = 0;
		$params['state'] = $unplan->state;
		$params['type_order'] = Order::TYPE_CYLINDER;
		$params['time_prepar'] = '';
		$params['time_prod'] = $unplan->time_manufac;
		$params['note'] = $unplan->note;
		$params['rating'] = 0;
		$params['date_exec'] = $date_exec;
		$id_action = (new OrderAction)->addUnplan($params);
		$action = (new OrderAction)->setData($id_action)->updateDateEndModel($unplan->time_end ? $unplan->time_end : '');
		return $id_action;
	}
	
	public function addOrderProduct($unplan)
	{
		$order = (new Order)->getData($unplan->id_order);
		if (!$order) $date_exec = '';
		else $date_exec = $order->date_exec ? $order->date_exec : '';
		// :id_order, :name, :symbol, :type, :number, :note, :qty, :id_parent, :state, :type_order, :date_exec
		$params['id_order'] = $unplan->id_order;
		$params['name'] = $unplan->prod_name;
		$params['symbol'] = $unplan->prod_symbol;
		$params['type'] = Product::TYPE_DETAIL;
		$params['number'] = 0;
		$params['note'] = '';
		$params['qty'] = $unplan->qty;
		$params['id_parent'] = 0;
		$params['state'] = $unplan->state;
		$params['type_order'] = Order::TYPE_CYLINDER;
		$params['date_exec'] = $date_exec;
	
		// debug($params);
		return (new OrderProduct)->addFromActionUnplanModel($params);
	}
	
	public function addActionStates($id_action, $unplan)
	{
		if (!$unplan->time_start) return;
		$params['id_action'] = $id_action;
		$params['time'] = $unplan->time_start;
		$params['id_user'] = $unplan->id_worker;
		$params['state'] = OrderActionState::PLANED;
		(new OrderActionState)->addModel($params);
		if (!$unplan->time_end) return;
		$params['time'] = $unplan->time_end;
		$params['state'] = OrderActionState::ENDED;
		(new OrderActionState)->addModel($params);
	}
	



}