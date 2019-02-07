<?php
require_once ('order_static.php');

class Order extends OrderStatic {

    public $content;

    public function __construct($order_id)
    {
        $this->tableName = 'orders';
        parent::__construct($order_id);
        $this->convertDate();
    }

    public function getContent()
    {
        $this->content = OrderContent::get($this->id);
        return $this;
    }
	
	public function toWork()
	{	
		$content = OrderContent::get($this->id);
		$products = OrderExtractProducts::get($content);
		OrderProducts::add($products, $this);
		$this->setState(OrderState::WORK);
		//todo для учета статистики добавить состояние в OrderState
		//$products = $this->getListOfProduct();
	}
	
	public function checkReadiness()
	{
		$products = OrderProducts::getAllOnOrder($this->id);
		if (!$products) return false;
		foreach ($products as $prod) {
			if ($prod->stateWork != self::STATE_WORK_END) $not_ready[]= $prod; 
		}
		if (empty($not_ready)) return true;
		return false;
	}


    public function update()
    {
        $state = Param::get('state');
        $date_state = time();

        if ($this->state == $state) $date_state = $this->date_state ? $this->date_state : time();
        else OrderState::set($this->id, $state);//for show history update

        $sql = "UPDATE `orders` SET `number` = :number, `date_exec` = :date_exec, `state` = :state, `date_state` =".$date_state;
        $sql .= ',`note` = :note, `type` = :type, `letter` = :letter, `count_pack` = :count_pack WHERE `id` ='.$this->id;
        self::perform($sql, Param::forUpdateOrder());
    }
    
	
}























