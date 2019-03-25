<?php

trait UserStatic  {
	
	use UserModel;
	
	public static function getWorkers()
	{
		$items = getWorkersModel();
        if ($items) return ObjectHelper::createArray($items, 'Worker');
        return false;
	}
	
	public static function loginStatic($password_form)
	{
		$user = self::getUserByLogin();
		if (!$user) throw new Exception('error_login');
		return self::checkPassword($user, $password_form);;
	}
	
	private static function checkPassword($user, $password_form)
	{
		if ($user->password != $password_form) throw new Exception('error_password');
		return new User($user->id);
	}

}