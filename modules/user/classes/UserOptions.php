<?php

class UserOptions extends UserBase
{

	public static function get($id_user)
	{
		$options = self::getByIdUser($id_user);
		return self::groupOptions($options);
	}
	
	public static function getByIdUser($id_user)
    {
        $sql = 'SELECT * FROM `user_options` WHERE `id_user` = :id_user AND `status` = :status';
		return self::perform($sql, ['id_user' => $id_user, 'status' => STATUS_ACTIVE])->fetchAll();
    }
	
	public static function groupOptions($options)
	{
		if (empty($options)) return false;
		$group = new stdClass;
		foreach ($options as $option) {
			$name = $option->name;
			$group->$name = $option->value; 
		}
		return $group;
	}
	

}