<?php
require_once('user_base.php');

class UserOptions extends UserBase
{

	public static function get($id_user)
    {
        $sql = 'SELECT `name`, `value` FROM `user_options` WHERE `id_user` = :id_user AND `status` = :status';
		return self::perform($sql, ['id_user' => $id_user, 'status' => self::STATUS_ACTIVE])->fetchAll();
    }
	

}