<?php
require_once('./core/model.php');

class ActionStatic extends Model {
	
	public static function getName($id_action)
	{
		$sql = 'SELECT `name` FROM 	`actions` WHERE `id` = :id_action';
		$params = ['id_action' => $id_action];
		return self::perform($sql, $params)->fetchColumn();
	}
	
}