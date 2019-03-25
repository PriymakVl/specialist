<?php

trait UserModel {
    
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
        return self::perform($sql, $params)->fetchAll();
	}
	
	public static function getUserByLogin()
	{
		$params = self::selectParams(['login', 'status']);
		$sql = 'SELECT *  FROM `users` WHERE `login` = :login AND `status` = :status';
        return self::perform($sql, $params)->fetch();
	}

}