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

    public static function forAddOrder()
    {
        $params = self::select(['number', 'letter', 'type', 'note']);
        $params['count_pack'] = self::get('count_pack', 0);
        $params['state'] = OrderState::PREPARATION;
        $params['date_state'] = time();
        $params['date_exec'] = Date::convertStringToTime(self::get('date_exec'));
        return $params;
    }

    public static function forUpdateOrder()
    {
        $params = self::select(['number', 'note', 'state', 'type', 'letter']);
        $params['date_exec'] = Date::convertStringToTime(self::get('date_exec'));
        $params['count_pack'] = self::get('count_pack', 0);
        return $params;
    }
}