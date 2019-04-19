<?php

trait OrderActionStateParam {

	public function insertParams()
	{
		$params = self::selectParams(['id_action', 'state']);
		$params['time'] = time();
		$params['id_user'] = $this->session->id_user;
		return $params;
	}
}