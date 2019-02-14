<?php
require_once('order_base.php');

class OrderStatic extends OrderBase {

	public static function getList($params)
	{
	    $where = self::bildWhere($params);
	    $sql = 'SELECT `id` FROM `orders` '.$where.' ORDER BY date_exec';
        $ids = self::perform($sql, $params)->fetchAll();
	    return self::createArrayOfOrder($ids);
	}

	private static function createArrayOfOrder($ids)
    {
        $orders = Helper::createArrayOfObject($ids, 'Order');
		foreach ($orders as $order) {
			$order->convertPositions()->getPositionsTable();
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
	
	public static function getForWorker($worker)
	{
		$params = ['state' => OrderState::WORK, 'status' => Order::STATUS_ACTIVE, 'type' => $worker->defaultTypeOrder];
		$orders = self::getList($params);
		$orders_worker = [];
		foreach ($orders as $order) {
			$products = OrderProducts::getForWorker($order, $worker);
			if ($products) $orders_worker[] = $order;
		}
		return $orders_worker;
	}

    public static function add($params)
    {
        $fields = 'symbol, positions, date_exec, type, state';
        $values = ':symbol, :positions, :date_exec, :type, :state';
        $sql = 'INSERT INTO `orders` ('.$fields.') VALUES ('.$values.')';
		self::insert($sql, $params);
    }
	
	public static function edit($params)
	{
		$sql = 'UPDATE `orders` SET `symbol` = :symbol, `description` = :description, `date_exec` = :date_exec, `type` = :type, `note` = :note 
			WHERE `id` = :id_order';
		return self::update($sql, $params);
	}

/*     public static function searchByNumber($number)
    {
        $sql = 'SELECT * FROM `orders` WHERE `number` like concat("%", :number, "%") AND `status` = '.self::STATUS_ACTIVE;
        return self::perform($sql, ['number' => $number])->fetchAll();
    } */
    
	
}























