<?php

trait UserAuthorization  {
	
	public function getUserByLogin()
	{
		$user = self::getUserByLoginModel();
		if (!$user) throw new Exception('error_login');
		return $this->checkPassword($user);;
	}
	
	private function checkPassword($user)
	{
		$password_form = trim($this->post->password);
		if ($user->password != $password_form) throw new Exception('error_password');
		return $this->setData($user);
	}

}