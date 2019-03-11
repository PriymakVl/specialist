<?php
require_once('order_base.php');

class OrderStatic extends OrderBase {

	public static function getList($params)
	{
		if ($params['state'] == OrderState::ALL) {
			$sql = 'SELECT `id` FROM `orders` WHERE `status` = :status ORDER BY rating DESC, date_exec ASC';
			unset($params['state']);
		}
	    else $sql = 'SELECT `id` FROM `orders` WHERE `state` = :state AND `status` = :status ORDER BY rating DESC, date_exec ASC';
        $ids = self::perform($sql, $params)->fetchAll();
	    return self::createArrayOfOrder($ids);
	}

	public static function createArrayOfOrder($ids)
    {
        $orders = Helper::createArrayOfObject($ids, 'Order');
		foreach ($orders as $order) {
			$order->getPositions()->getPositionsTable();
		}
		return $orders;
    }
	
	public static function getBySymbol($symbol)
	{
	   if (empty($symbol)) return false;
	   $sql = 'SELECT * FROM `orders` WHERE `symbol` = :symbol AND `status` = :status';
	   $params = ['symbol' => $symbol, 'status' => self::STATUS_ACTIVE];
	   return self::perform($sql, $params)->fetch();
	}

    public static function add($params)
    {
		unset($params['save']);
        $fields = 'symbol, note, date_exec, type, state, rating, date_reg';
        $values = ':symbol, :note, :date_exec, :type, :state :rating, :date_reg';
        $sql = 'INSERT INTO `orders` ('.$fields.') VALUES ('.$values.')';
		return self::insert($sql, $params);
    }
	
	public static function edit($params)
	{
		unset($params['save']);
		$sql = 'UPDATE `orders` SET `symbol` = :symbol, `date_exec` = :date_exec, `type` = :type, `note` = :note, `rating` = :rating
		WHERE `id` = :id_order';
		return self::update($sql, $params);
	}

    public static function searchBySymbol($symbol)
    {
        $sql = 'SELECT * FROM `orders` WHERE `symbol` like concat("%", :symbol, "%") AND `status` = :status';
        $params = ['symbol' => $symbol, 'status' => self::STATUS_ACTIVE];
        return self::perform($sql, $params)->fetchAll();
    }
	
	public static function checkReady($id_order = null)
	{
		$params = ParamOrderAction::getNotReadyActionOrder();
		$params['id_order'] = empty($params['id_order']) ? $id_order : $params['id_order'];
		$order = new Order($params['id_order']);
		$result = OrderAction::getNotReadyActionOrder($params);
		$result_unplan = OrderActionUnplan::getNotReadyActionOrder($order->id);
		if ($result || $result_unplan) $order->setState(OrderState::WORK);
		else $order->setState(OrderState::MADE);
	}
    
	
}























