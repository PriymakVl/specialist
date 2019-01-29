<?php
require_once('product_static.php');

class Product extends ProductStatic {

    public $specifications;
	public $specifQty; //количество деталей в спецификации
    public $orderQty; //количество деталей в заказе
	public $idSpecifActive;

    public function __construct($user_id)
    {
        $this->tableName = 'products';
        parent::__construct($user_id);
    }

    public function getSpecifications()
    {
        $this->specifications = Specification::getAllForProduct($this->id);
        return $this;
    }




//    public function update()
//    {
//        $state = Param::get('state');
//        $date_state = time();
//
//        if ($this->state == $state) $date_state = $this->date_state ? $this->date_state : time();
//        else OrderState::set($this->id, $state);//for show history update
//
//        $sql = "UPDATE `orders` SET `number` = :number, `date_exec` = :date_exec, `state` = :state, `date_state` =".$date_state;
//        $sql .= ',`note` = :note, `type` = :type, `letter` = :letter, `count_pack` = :count_pack WHERE `id` ='.$this->id;
//        self::perform($sql, Param::forUpdateOrder());
//    }
    
	
}























