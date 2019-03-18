<?php

require_once('param.php');

class ParamOrder extends Param {

    public static function getList()
    {
        $params['state'] = self::get('state');
		if (empty($params['state'])) $params['state'] = OrderState::WORK;
		$params['status'] = Model::STATUS_ACTIVE;
		return $params;
    }

    public static function add()
    {
		$keys = ['symbol', 'type', 'note', 'state', 'save', 'rating'];
        $params = self::getAll($keys);
        $params['date_exec'] = Date::convertStringToTime(self::get('date_exec'));
		$params['state'] = empty($params['state']) ? OrderState::REGISTERED : $params['state'];
		$params['date_reg'] = time();
		if (isset($params['symbol'])) $params['symbol'] = trim($params['symbol']);
        return $params;
    }

    public static function edit()
    {
		$keys = ['symbol', 'position', 'type', 'note', 'date_exec', 'id_order', 'save', 'edit_all', 'rating', 'state'];
        $params = self::getAll($keys);
		if (empty($params['date_exec'])) $params['date_exec'] = '';
        $params['date_exec'] = Date::convertStringToTime($params['date_exec']);
		if (isset($params['symbol'])) $params['symbol'] = trim($params['symbol']);
        return $params;
    }
	
	public static function changeQtyProduct()
	{
		$keys = ['id_item', 'qty'];
		return self::getAll($keys);
	}
	
	public static function addPosition()
	{
		$keys = ['id_order', 'symbol', 'qty', 'note'];
		$params = self::getAll($keys);
		return $params;
	}
	
	public static function addContent()
	{
		$params['id_prod'] = (Param::get('id_prod'));
		$params['id_order'] = Session::get('order-active');
		$params['quantity'] = 1;
		return $params;
	}
	
	
}