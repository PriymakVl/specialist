<?php

trait OrderActionParamTerminal {

	private function getAllNotReadyForTerminalModelParams()
	{
		$params = self::selectParams(['type_order', 'status']);
		$params['state'] = OrderActionState::ENDED;
		return $params;
	}
	
	private function getForAllOrdersForTerminalModelParams()
	{
		$worker = (new Worker)->setData($this->session->id_user)->getOptions();
		$params['status'] = STATUS_ACTIVE;
		$params['ended'] = OrderActionState::ENDED;
		$params['waiting'] = OrderActionState::WAITING;
		$params['name'] = $this->get->action ? trim($this->get->action) : $worker->options->default_action;
		$params['type_order'] = $this->get->type_order ? $this->get->type_order : $worker->options->default_type_order;
		return $params;
	}
	
	private function getForOneOrderForTerminalModelParams()
	{
		$params['status'] = STATUS_ACTIVE;
		$params['ended'] = OrderActionState::ENDED;
		$params['waiting'] = OrderActionState::WAITING;
		$params['name'] = trim($this->get->action);
		$params['id_order'] = $this->get->id_order;
		return $params;
	}
}