<?php

trait OrderTotal {
	
	use OrderModel;

	public function getList()
	{
		if ($this->get->state == OrderState::ALL) $items = $this->getAllOrdersModel();
		else $items = $this->getByStateModel();
		if ($items) return ObjectHelper::createArray($items, 'Order', ['setData', 'getPositions', 'getPositionsTable']);
	}
	
	public function getListForPlan()
	{
		$items = $this->getListForPlanModel();
		if ($items) return ObjectHelper::createArray($items, 'Order', ['setData', 'getProducts', 'getProductsTable', 'convertProperties']);
	}
	
	private function addProductsByPositions()
	{
		(new OrderProduct)->addProductsByPositions($this->positions);
	}
	
	// public function checkReadyTotal()
	// {
		// $result = (new OrderAction)->getNotReadyActionOrder($this->id);
		// $result_unplan = (new OrderActionUnplan)->getNotReadyActionOrder($this->id);
		// if (empty($result) && empty($result_unplan)) $this->editState(OrderState::MADE);
		// else $this->editState(OrderState::WORK);
	// }
	
	public static function deleteTotal($id_order)
	{
		//OrderProduct::deleteOrder($id_order);
		//OrderAction::deleteOrder($id_order);
		//OrderActionUnplan::deleteOrder($id_order);
		//OrderActionState::deleteOrder($id_order);
	}
	

}























