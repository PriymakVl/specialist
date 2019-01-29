<?php
require_once('specification_static.php');

class Specification extends SpecificationStatic {

    public $time_production; //трудоемкость
    public $time_prepare; //подготовительно заключительное
    public $time_piece; //штучное
    public $products;

    public function __construct($id_specif)
    {
        $this->tableName = 'specifications';
        parent::__construct($id_specif);
    }

    public function getProducts()
    {
        $this->products = SpecificationContent::getAllByIdSpecification($this->id);
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























