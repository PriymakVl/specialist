<?php

require_once ('param_base.php');
require_once ('./modules/order/models/order_state.php');

class Param extends ParamBase {

    public static function forOrderList()
    {
        $keys = ['type', 'state', 'status'];
        $defaults = ['status' => Model::STATUS_ACTIVE, 'state' => OrderState::REGISTERED];
        return self::getAll($keys, $defaults);
    }

    public static function addOrder()
    {
		$keys = ['symbol', 'positions', 'type', 'note', 'state'];
        $params = self::getAll($keys);
        $params['date_exec'] = Date::convertStringToTime(self::get('date_exec'));
		$params['state'] = empty($params['state']) ? OrderState::REGISTERED : $params['state'];
		$params ['positions'] = Order::serializePositions($params['positions']);
        return $params;
    }

    public static function editOrder()
    {
		$keys = ['symbol', 'position', 'type', 'note', 'date_exec', 'id_order'];
		$defaults = ['date_exec' => ''];
        $params = self::getAll($keys, $defaults);
        $params['date_exec'] = Date::convertStringToTime($params['date_exec']);
        return $params;
    }
	
	public static function terminalStartWork()
	{
		$keys = ['id_order', 'id_prod', 'id_worker'];
		$params = self::getAll($keys);
		$params['state_work'] = Order::STATE_WORK_PROGRESS;
		$params['time_start'] = time();
		return $params;
	}
	
	public static function terminalEndWork()
	{
		$keys = ['id_order', 'id_prod'];
		$params = self::getAll($keys);
		$params['state_work'] = Order::STATE_WORK_END;
		$params['time_end'] = time();
		return $params;
	}
	
	public static function terminalStopWork()
	{
		$keys = ['id_order', 'id_prod'];
		$params = self::getAll($keys);
		$params['state_work'] = Order::STATE_WORK_STOPPED;
		return $params;
	}
	
	public static function addProduct()
	{
		$keys = ['symbol', 'name', 'quantity', 'id_parent', 'type', 'note'];
		$params = self::getAll($keys);
		return $params;
	}
	
	public static function editProduct()
	{
		$keys = ['symbol', 'name', 'quantity', 'id_parent', 'type', 'note'];
		$params = self::getAll($keys);
		$params['status'] = Model::STATUS_ACTIVE;
		return $params;
	}
	
	public static function copyProduct()
	{
		$product = new Product(self::get('id_prod'));
		$params['symbol'] = $product->symbol;
		$params['name'] = $product->name;
		$params['quantity'] = $product->quantity;
		$params['type'] = $product->type ? $product->type : 4;
		$params['note'] = $product->note ? $product->note : '';
		$params['id_parent'] = Session::get('product-active');
		return $params;
	}
	
	public static function changeQtyProductOrder()
	{
		$keys = ['id_order', 'id_prod', 'qty'];
		return self::getAll($keys);
	}
	
}