<?php

trait OrderActionStateModel {

	public static function add($params)
	{
		$params = self::selectParams($params, ['id_action', 'time', 'state', 'id_worker', 'type_action']);
		$sql = "INSERT INTO `order_action_states` (id_action, time, state, id_worker, type_action) 
			VALUES (:id_action, :time, :state, :id_worker, :type_action)";
        return self::perform($sql, $params);
	}
	
	public static function getAllByIdAction($params)
	{
		$sql = 'SELECT * FROM `order_action_states` WHERE `id_action` = :id_action AND `status` = :status AND `type_action` = :type';
		return self::perform($sql, $params)->fetchAll();
	}


}