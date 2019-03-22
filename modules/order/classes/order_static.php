<?php
require_once('order_model.php');

class OrderStatic extends OrderModel {

	public static function getList($state)
	{
		if ($state == OrderState::ALL) $ids = self::getStateAll();
		else $ids = self::getStateOne($state);
        if ($ids) return self::createArrayOfOrder($ids);
	}
	
	protected static function createArrayOfOrder($ids)
    {
        $orders = Helper::createArrayOfObject($ids, 'Order');
		foreach ($orders as $order) {
			$order->getPositions()->getPositionsTable();
		}
		return $orders;
    }
	
	public static function checkReadyStatic($id_order)
	{
		$order = new Order($id_order);
		$result = OrderAction::getNotReadyActionOrder($id_order);
		$result_unplan = OrderActionUnplan::getNotReadyActionOrder($id_order);
		if (empty($result) && empty($result_unplan)) $order->editState(OrderState::MADE);
		if ($result || $result_unplan) $order->editState(OrderState::WORK);
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























