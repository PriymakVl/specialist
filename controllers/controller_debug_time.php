<?php

class Controller_Debug_Time extends Controller_Base {

	public function action_edit() 
	{
		$actions = OrderAction::getAll('order_actions');
		foreach ($actions as $action) {
			$action = (new OrderAction)->setData($action)->getProduct();
			if (!$action->product) continue;
			if (!$action->product->symbol) continue;
			$actions_base = (new ProductAction)->getAllBySymbolProductModel($action->product->symbol);
			if ($actions_base) $this->editTimeAction($action, $actions_base);
		}
		debug('exit');
	}
	
	private function editTimeAction($action, $actions_base)
	{
		foreach ($actions_base as $item) {
			if ($action->name == $item->name) {
				$action->updateTimeModel($item);
				return;
			}
		}
	}


}