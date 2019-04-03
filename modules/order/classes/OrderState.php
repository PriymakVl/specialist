<?php

class OrderState extends OrderBase {

    const REGISTERED = 1;
    const PREPARATION = 2;
    const WORK = 3;
    const MADE = 4;
    const SENT = 5;
    const ALL = 6;
	
	public function __construct($id = false)
	{
		parent::__construct($id);
		$this->message->section = 'order_state';
	}
	
	public function check($id_order)
	{
		$products = (new OrderProduct)->getAllOnOrder($id_order);
		if (!$products) return (new Order)->setData($id_order)->setState(self::REGISTERED);
		foreach ($products as $product) {
			if ($product->state == OrderProduct::STATE_WAITING) return (new Order)->setData($id_order)->setState(self::PREPARATION);
			if ($product->state == OrderProduct::STATE_STOPPED || $product->state == OrderProduct::STATE_PROGRESS) return (new Order)->setData($id_order)->setState(self::WORK);
		}
		return (new Order)->setData($id_order)->setState(self::MADE);
	}

    public function setStateString($state)
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