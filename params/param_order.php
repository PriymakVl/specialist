<?php

require_once('param.php');

class ParamOrder extends Param {

    public static function getList()
    {
        $keys = ['type', 'state', 'status'];
        $defaults = ['status' => Model::STATUS_ACTIVE, 'state' => OrderState::REGISTERED];
        return self::getAll($keys, $defaults);
    }

    public static function add()
    {
		$keys = ['symbol', 'type', 'note', 'state'];
        $params = self::getAll($keys);
        $params['date_exec'] = Date::convertStringToTime(self::get('date_exec'));
		$params['state'] = empty($params['state']) ? OrderState::REGISTERED : $params['state'];
        return $params;
    }

    public static function edit()
    {
		$keys = ['symbol', 'position', 'type', 'note', 'date_exec', 'id_order'];
		$defaults = ['date_exec' => ''];
        $params = self::getAll($keys, $defaults);
        $params['date_exec'] = Date::convertStringToTime($params['date_exec']);
        return $params;
    }
	
	public static function changeQtyProduct()
	{
		$keys = ['id_order', 'id_prod', 'qty'];
		return self::getAll($keys);
	}
	
	public static function addPosition()
	{
		$keys = ['id_order', 'symbol', 'qty', 'note'];
		$params = self::getAll($keys);
		return $params;
	}
	
}