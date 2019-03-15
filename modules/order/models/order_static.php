<?php
require_once('order_model.php');

class OrderStatic extends OrderModel {

	public static function getList($params)
	{
		if ($params['state'] == OrderState::ALL) $ids = self::getStateAll($params);
		else $ids = self::getStateOne($params);
        if (empty($ids) return false;
	    return self::createArrayOfOrder($ids);
	}
	

}























