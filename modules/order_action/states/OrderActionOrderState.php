<?php

trait OrderActionOrderState {

	private function editStateOrder()
	{
		if (!$this->id_order) return $this;
		$order = (new Order)->setData($this->id_order)->getActions();
		$state_order = $this->determineStateOrderWheNChangeStateAction($order);
		if ($state_order) $order->setState($state_order);
		return $this;
	}
	
	private function determineStateOrderWhenChangeStateAction($order)
	{
		if (ObjectHelper::checkValuesProperty($order->actions, 'state', OrderActionState::ENDED)) return OrderState::MADE;
		if (ObjectHelper::checkValuesProperty($order->actions, 'state', OrderActionState::WAITING)) return OrderState::WAITING;
		if ($order->state == OrderState::PLANED && $this->get->state == OrderActionState::PROGRESS) return OrderState::WORK;
	}
}