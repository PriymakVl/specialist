<?php
require_once('order_model.php');

class OrderStatic extends OrderModel {

	public static function getList($params)
	{
		if ($params['state'] == OrderState::ALL) $ids = self::getStateAll($params);
		else $ids = self::getStateOne($params);
        if (empty($ids)) return false;
	    return self::createArrayOfOrder($ids);
	}
	
	protected static function createArrayOfOrder($ids)
    {
        $orders = Helper::createArrayOfObject($ids, 'Order');
		foreach ($orders as $order) {
			$order->getPositions()->getPositionsTable();
		}
		return $orders;
    }
	
	public static function checkReadyStatic()
	{
		$params = ParamOrderAction::getNotReadyActionOrder();
		$order = new Order($params['id_order']);
		$result = OrderAction::getNotReadyActionOrder($params);
		$result_unplan = OrderActionUnplan::getNotReadyActionOrder($order->id);
		if (empty($result) && empty($result_unplan)) $order->setState(OrderState::MADE);
		if ($result || $result_unplan) $order->setState(OrderState::WORK);
	}
	
	public static function convertRatingStatic($rating)
	{
		switch($rating) {
			case self::RATING_REGULAR: return 'Обычный';
			case self::RATING_IMPORTANT: return 'Важный';
			case self::RATING_PRIORITY: return 'Первоочередной';
		}
	}
	
	public function countTimeManufacturingOrder()
	{
		if (!$this->time_prod) return $this;
		$this->timeManufacturingOrder = ProductTime::manufacturingOrder($this);
		return $this;
	}
	
	public static function manufacturingOrder($product)
	{
		$time_prepar = $product->time_prepar ? $product->time_prepar : 0;
		return ($product->orderQtyAll * $product->time_prod) + $time_prepar;
	}
	

}























