<?php

trait OrderActionProductState {

	private function determineStateProductWhereChangeStateAction($id_prod)
	{
		$actions = $this->getActionsProductWithoutCurrentAction($id_prod);
		if (empty($actions)) return $this->get->state;
		if ($this->get->state == OrderActionState::WAITING) $state = $this->checkStateProductWaiting($actions);
		if ($state) return OrderProduct::STATE_WAITING;
		return OrderProduct::STATE_PLANED;
	}
	
	private function getActionsProductWithoutCurrentAction($id_prod)
	{
		$actions = [];
		$items = $this->getAllForProductNotStateEndedModel($id_prod);
		foreach ($items as  $item) {
			if ($item->id != $this->id) $actions[] = $item;
		}
		return $actions;
	}
	
	private function editStateProduct()
	{
		if (!$this->id_prod) return $this;
		$product = (new OrderProduct)->setData($this->id_prod);
		$edit = $this->checkNeedChangeStateProduct($product);
		if ($product->state == $this->get->state) return $this;
		$state_prod = $this->determineStateProductWhereChangeStateAction($product->id);
		$product->setState($state_prod);
		return $this;
	}
	
	private function checkNeedChangeStateProduct()
	{
		if (!$this->
		$items = $this->getByIdProductModel($this->id_prod
	}

}