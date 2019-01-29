<?php
require_once('user_static.php');

class User extends UserStatic {

    public function __construct($user_id)
    {
        $this->tableName = 'users';
        parent::__construct($user_id);
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























