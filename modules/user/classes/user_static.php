<?php
require_once('user_model.php');

class UserStatic extends UserModel {
	
	public static function getWorkers()
	{
		$items = getWorkersModel();
        if ($items) return Helper::createArrayOfObject($ids, 'Worker');
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