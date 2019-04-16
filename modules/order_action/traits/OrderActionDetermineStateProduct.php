<?php

trait OrderActionDetermineStateProduct {

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
	
	private function checkStateProductWaiting($actions)
	{
		foreach ($actions as $action) {
			if ($action->state != OrderActionState::WAITING) return false;
		}
		return true;
	}

}