<?php
require_once('order_action_base.php');

class OrderActionModel extends OrderActionBase {

	
	private static function addOne($params)
	{
        $sql = "INSERT INTO `order_actions` (id_order, id_prod, qty, id_data, state, type_order, time_manufac, rating) 
		VALUES (:id_order, :id_prod, :qty, :id_data, :state, :type_order, :time_manufac, :rating)";
        return self::perform($sql, $params);
	}
	
	public static function getForTerminal($params)
	{
		if ($params['action'] == 'all' && $params['order'] == 'all') $ids = self::getAllNotReadyActions($params);
		else if ($params['action'] != 'all' && $params['order'] == 'all' )$ids = self::getForAllOrders($params);
		else $ids = self::getForOneOrder($params);
		return self::createArrayActions($ids);
	}
	
	public static function getForAllOrders($params)
	{
		unset($params['order']);
		$sql = 'SELECT `id` FROM `order_actions` 
		WHERE `id_data` = :action AND `state` != :state AND `type_order` = :type_order AND `status` = :status ORDER BY `rating` DESC';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public static function getForOneOrder($params)
	{
		unset($params['type_order']);
		if ($params['action'] == 'all') {
			$where = 'WHERE `state` != :state AND `id_order` = :order AND `status` = :status ORDER BY `rating` DESC, `state` DESC'; 
			unset($params['action']);
		}
		else $where = 'WHERE `id_data` = :action AND `state` != :state AND `id_order` = :order AND `status` = :status ORDER BY `rating` DESC, `state` DESC';
		$sql = 'SELECT `id` FROM `order_actions` '.$where;
		return self::perform($sql, $params)->fetchAll();
	}
	
	// public static function getByIdOrderAndIdProductAndIdAction($params)
	// {
		// $sql = 'SELECT * FROM `order_actions` WHERE `id_data` = :id_data AND `id_order` = :id_order AND `id_prod` = :id_prod';
		// return self::perform($sql, $params)->fetch();
	// }
	
	public static function getAllNotReadyActions($params)
	{
		unset($params['action'], $params['order']);
		$sql = 'SELECT `id` FROM `order_actions` WHERE `state` != :state AND `type_order` = :type_order AND `status` = :status ORDER BY `rating` DESC, `state` DESC';
		return self::perform($sql, $params)->fetchAll();
	}
	
	// public static function setStateStartWork($params)
	// {
		// unset($params['action']);
		// $sql = 'UPDATE `order_actions` SET `state` = :state, `time_start` = :time, `id_worker` = :id_worker WHERE `id` = :id';
		// return self::perform($sql, $params);
	// }
	
	// public static function setStateEndWork($params)
	// {
		// unset($params['action'], $params['id_worker']);
		// $sql = 'UPDATE `order_actions` SET `state` = :state, `time_end` = :time WHERE `id` = :id';
		// return self::perform($sql, $params);
	// }
	
	// public static function setStateStopWork($params)
	// {
		// unset($params['action'], $params['id_worker'], $params['time']);
		// $sql = 'UPDATE `order_actions` SET `state` = :state WHERE `id` = :id';
		// return self::perform($sql, $params);
	// }
	
	public static function setStateModel($params)
	{
		$params = self::selectParams($params, ['state', 'id_worker', 'id_action']);
		$sql = 'UPDATE `order_actions` SET `state` = :state, `id_worker` = :id_worker WHERE `id` = :id_action';
		return self::perform($sql, $params);
	}
	
	public static function setTimeStart($params)
	{
		$params = self::selectParams($params, ['time', 'id_worker', 'id_action']);
		$sql = 'UPDATE `order_actions` SET `time_start` = :time, `id_worker` = :id_worker WHERE `id` = :id_action';
		return self::perform($sql, $params);
	}
	
	public static function setTimeEnd($params)
	{
		$params = self::selectParams($params, ['time', 'id_worker', 'id_action']);
		$sql = 'UPDATE `order_actions` SET `time_end` = :time, `id_worker` = :id_worker WHERE `id` = :id_action';
		return self::perform($sql, $params);
	}
	
	public static function getNotReadyActionOrder($id_order)
	{
		$params = ['id_order' => $id_order, 'state' => OrderActionState::ENDED, 'status' => self::STATUS_ACTIVE];
		$sql = 'SELECT * FROM `order_actions` WHERE `state` != :state AND `id_order` = :id_order AND `status` = :status';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public static function planWorker($params)
	{
		$sql = 'SELECT * FROM `order_actions` WHERE `id_data` IN ('.$params['default_actions'].') AND `state` != :state AND `status` = :status';
		unset($params['default_actions']);
		return self::perform($sql, $params)->fetchAll();
	}
	
	public static function madeWorker($params)
	{
		$slq = 'SELECT * FROM `order_actions` 
		WHERE `id_worker` = :id_worker AND `state` = :state AND `time_end` BETWEEN :period_start AND :period_end AND `status` = :status';
		return self::perform($slq, $params)->fetchAll();
	}
	
	public static function getIdActionsByIdOrder($id_order)
	{
		$slq = 'SELECT * FROM `order_actions` WHERE `id_order` = :id_order AND `status` = :status';
		$params = ['id_order' => $id_order, 'status' => self::STATUS_ACTIVE];
		return self::perform($slq, $params)->fetchAll();
	}
	
	
	public static function setStateEndedForAllActionsOrder($id_order)
	{
		$sql = 'UPDATE `order_actions` SET `state` = :state WHERE `id_order` = :id_order';
		$params = ['id_order' => $id_order, 'state' => OrderActionState::ENDED];
		return self::perform($sql, $params);
	}
	
	public static function getProductsOrder($id_order)
	{
		$slq = 'SELECT `id_prod` FROM `order_actions` WHERE `id_order` = :id_order AND `status` = :status GROUP BY `id_prod`';
		$params = ['id_order' => $id_order, 'status' => self::STATUS_ACTIVE];
		return self::perform($slq, $params)->fetchAll();
	}
	
	public static function addNote($params)
	{
		unset($params['action']);
		$sql = 'UPDATE `order_actions` SET `note` = :note WHERE `id` = :id';
		return self::perform($sql, $params);
	}
	
	public static function updateRating($id_order, $rating)
	{
		$sql = 'UPDATE `order_actions` SET `rating` = :rating WHERE `id_order` = :id_order';
		$params = ['rating' => $rating, 'id_order' => $id_order];
		return self::perform($sql, $params);
	}
	
	public static function getOrdersForTerminal()
	{
		$orders = [];
		$slq = 'SELECT `id_order` FROM `order_actions` WHERE `state` != :state AND `status` = :status GROUP BY `id_order`';
		$params = ['state' => OrderActionState::ENDED, 'status' => self::STATUS_ACTIVE];
		$items = self::perform($slq, $params)->fetchAll();
		if (empty($items)) return $orders;
		foreach ($items as $item) {
			$orders[] = new Order($item->id_order);
		}
		return $orders;
	}
	
	public static function getAllOrdersByIdProduct($id_prod)
	{
		$slq = 'SELECT `id_order` FROM `order_actions` WHERE `id_prod` = :id_prod AND `status` = :status GROUP BY `id_order`';
		$params = ['id_prod' => $id_prod, 'status' => self::STATUS_ACTIVE];
		return self::perform($slq, $params)->fetchAll();
	}
	
	public static function getActionsProductInOrder($id_order, $id_prod)
	{
		$slq = 'SELECT `id` FROM `order_actions` WHERE `id_prod` = :id_prod AND `id_order` = :id_order AND `status` = :status';
		$params = ['id_prod' => $id_prod, 'status' => self::STATUS_ACTIVE, 'id_order' => $id_order];
		return self::perform($slq, $params)->fetchAll();
	}
	
	public static function getOrdersWhereStateActionsNotEnded()
	{
		$slq = 'SELECT `id_order` FROM `order_actions` WHERE `state` != :state AND `status` = :status GROUP BY `id_order`';
		$params = ['state' => OrderActionState::ENDED, 'status' => self::STATUS_ACTIVE];
		$items = self::perform($slq, $params)->fetchAll();
	}
	
	
	
	
}























