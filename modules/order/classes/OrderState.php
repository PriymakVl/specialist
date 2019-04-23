<?php

class OrderState extends OrderBase {

    const ALL = 'all';
    const REGISTERED = 1;
    const PREPARATION = 2;
	const PLANED = 3;
    const WORK = 4;
	const WAITING = 5;
    const MADE = 6;
    const SENT = 7;

	
	
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
			case self::PLANED: return 'Запланирован';
            case self::WORK: return'В работе';
            case self::MADE: return 'Выполнен';
            case self::WAITING: return 'Отложен';
            default: throw new Exception('Состояние заказа указано неверно');
        }
    }
	
	 public function setStateBg($state)
    {
        switch($state){
            case self::REGISTERED: return '#040404';
            case self::PREPARATION: return '#040404';
            case self::PLANED: return '#F0FFF0';
            case self::WORK: return 'yellow';
            case self::MADE: return 'green';
            case self::WAITING: return '#FFE4B5';
            default: throw new Exception('Состояние заказа указано неверно');
        }
    }
	
	public function determine($id_order)
	{
		$order = (new Order)->setData($id_order)->getActions();
		if (!$order->actions) return;
		if (ObjectHelper::checkValuesProperty($order->actions, 'state', OrderActionState::ENDED)) return OrderState::MADE;
		if (ObjectHelper::checkValuesProperty($order->actions, 'state', OrderActionState::WAITING)) return OrderState::WAITING;
		if ($order->state == self::WAITING && $this->get->state == OrderProduct::STATE_PLANED) return OrderState::PLANED;
	}
}