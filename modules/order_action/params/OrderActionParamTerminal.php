<?php

trait OrderActionParamTerminal {

	private function getAllNotReadyForTerminalParams()
	{
		$params = self::selectParams(['type_order', 'status']);
		$params['state'] = OrderActionState::ENDED;
		return $params;
	}
	
	private function getForAllOrdersForTerminalParams()
	{
		$worker = (new Worker)->setData($this->session->id_user)->getProperties();
		$params['status'] = STATUS_ACTIVE;
		$params['ended'] = OrderActionState::ENDED;
		$params['waiting'] = OrderActionState::WAITING;
		$params['name'] = $this->get->action ? trim($this->get->action) : $worker->defaultAction;
		$params['type_order'] = $this->get->type_order ? $this->get->type_order : $worker->defaultTypeOrder;
		return $params;
	}
	
	private function getForOneOrderForTerminalParams()
	{
		$params['status'] = STATUS_ACTIVE;
		$params['ended'] = OrderActionState::ENDED;
		$params['waiting'] = OrderActionState::WAITING;
		$params['name'] = trim($this->get->action);
		$params['id_order'] = $this->get->id_order;
		return $params;
	}
}