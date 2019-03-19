<?php
require_once('order_action_unplan_model.php');

class OrderActionUnplanStatic extends OrderActionUnplanModel {
	
	
	public static function getActions()
	{
		$items = self::getActionsModel();
		if($items) return self::createArrayActionsUnplan($actions);
	}
	
	public static function createArrayActionsUnplan($actions_arr)
	{
		$actions = Helper::createArrayOfObject($actions_arr, 'OrderActionUnplan');
		foreach ($actions as $action) {
			$action->getOrder()->setBgTerminalBox();
		}
		return $actions;
	}
	
}























