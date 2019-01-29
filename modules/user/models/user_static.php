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

}