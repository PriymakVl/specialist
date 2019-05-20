<?php

trait OrderActionStateParam {

	public function addParams()
	{
		// $params = self::selectParams(['id_action', 'state']);
		debug($this->params);
		$params['id_action'] = $this->params->id_action;
		$params['state'] = $this->params->state;
		$params['time'] = time();
		$params['id_user'] = $this->session->id_user;
		return $params;
	}
}