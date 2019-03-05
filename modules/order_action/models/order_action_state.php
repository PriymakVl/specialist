<?php
require_once('order_action_base.php');

class OrderActionState extends OrderActionBase {
	
    const PLANED = 1; //работа запланирована
    const PROGRESS = 2; //работа выполняется
    const STOPPED = 3; //работа остановлена по какой то причине
    const ENDED = 4; //работа закончена
    const WAITING = 5; //ожидает окончание выполнения предыдущей операции

	public static function add($params)
	{
		$params['id_action'] = $params['id'];
		$params['type_action'] = ($params['action'] == 'unplan') ? 'unplan' : 'plan';
		unset($params['id'], $params['action']);
		$sql = "INSERT INTO `order_action_states` (id_action, time, state, id_worker, type_action) 
		VALUES (:id_action, :time, :state, :id_worker, :type_action)";
        return self::perform($sql, $params);
	}
	
	public static function getByIdAction($params)
	{
		$sql = 'SELECT * FROM `order_action_states` WHERE `id_action` = :id_action AND `status` = :status AND `type_action` = :type';
		return self::perform($sql, $params)->fetchAll();
	}
	
	
}























