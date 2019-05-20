<?php

trait OrderActionStateParam {

	public function addParams()
	{
		// $params['id_action'] = $this->params->id_action;
		// $params['state'] = $this->params->state;
		$params = self::getParams(['id_action', 'state']);
		debug($params);
		$params['time'] = time();
		$params['id_user'] = $this->session->id_user;
		return $params;
	}
}