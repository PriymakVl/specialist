<?php

class OrderState extends OrderBase {

    const REGISTERED = 1;
    const PREPARATION = 2;
    const WORK = 3;
    const MADE = 4;
    const SENT = 5;
    const ALL = 6;

    public static function get($order_id)
    {
        $sql = 'SELECT `state`, `date` FROM `orders_states` WHERE `order_id` = :order_id';
        $states = self::perform($sql, ['order_id' => $order_id])->fetchAll();
        return self::prepareStates($states);
    }

    public static function set($order_id, $state)
    {
        $params = ['order_id' => $order_id, 'date' => time(), 'state'=> $state];
        $sql = "INSERT INTO `orders_states` (order_id, date, state) VALUES (:order_id, :date, :state)";
        self::perform($sql, $params);
    }

    public static function getName($state)
    {
        switch($state) {
            case self::WORK: return Message::get('order_state', 'work');
            case self::PREPARATION: return Message::get('order_state', 'preparation');
            default: return Message::get('order_state', 'error');
        }
    }

    public static function prepareStates($states)
    {
        foreach ($states as $item) {
            $item->stateName = self::getName($item->state);
            $item->date = date('d.m.y', $item->date);
        }
        return $states;
    }

    public static function convert($state)
    {
        switch($state){
            case self::REGISTERED: return 'Зарегистрирован';
            case self::PREPARATION: return 'В подготовке';
            case self::WORK: return'В работе';
            case self::MADE: return 'Выполнен';
            default: throw new Exception('Состояние заказа указано неверно');
        }
    }

}