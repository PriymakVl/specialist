<?php

trait DrawingParam {

	use Param;
	
	public function addDataParams($filename)
	{
		$params['note'] = self::getParam('note');
		$params['symbol'] = trim(self::getParam('symbol'));
		$params['filename'] = $filename;
		$params['id_user'] = $this->session->id_user;
		$params['date_add'] = time();
		return $params;
	}
	
}