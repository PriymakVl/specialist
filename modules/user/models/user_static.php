<?php
require_once('user_base.php');

class UserStatic extends UserBase {
    
    public static function  getByPassword($password)
    {
        $sql = 'SELECT `id`  FROM `users` WHERE `password` = :password';
        $id = self::perform($sql, ['password' => $password])->fetchColumn();
        if ($id) return new User($id);
        return false;
    }
	
	public static function getWorkers()
	{
		$sql = 'SELECT `id`  FROM `users` WHERE `position` = :position AND `status` = :status';
		$params =  ['position' => self::POSITION_WORKER, 'status' => self::STATUS_ACTIVE];
        $ids = self::perform($sql, $params)->fetchAll();
        if ($ids) return Helper::createArrayOfObject($ids, 'Worker');
        return false;
	}
	
	public static function authorisation($params)
	{
		$user = self::getUserByLogin($params['login']);
		if (!$user) return false;
		if ($user->password == $params['password']) return new User($user->id);
		else throw new Exception('Неверный пароль');
	}
	
	public static function getUserByLogin($login)
	{
		$sql = 'SELECT *  FROM `users` WHERE `login` = :login';
        $id = self::perform($sql, ['login' => $login])->fetch();
        if (!$id) throw new Exception('Неверный логин');
        return $id;
	}

}