<?php
require_once ('./core/model.php');
require_once ('./helpers/date.php');
require_once ('./helpers/message.php');
require_once ('./helpers/helper.php');
require_once ('./modules/specification/models/specification.php');
require_once ('./modules/product/models/product.php');
require_once ('order_content.php');
require_once ('order_extract_products.php');
require_once ('order_products.php');

class OrderBase extends Model
{

    const TYPE_CYLINDER = 1;
    const TYPE_CAR_NUMBER = 2;
	
	const STATE_WORK_PLANED = 1; //работа запланирована
	const STATE_WORK_PROGRESS = 2; //работа выполняется
	const STATE_WORK_STOPPED = 3; //работа остановлена по какой то причине
	const STATE_WORK_END = 4; //работа закончена
	const STATE_WORK_WAITING = 5; //ожидает окончание выполнения предыдущей операции
	
	const KIND_WORK_CUTTING = 1; //порезка заготовок
	const KIND_WORK_MAKE = 2; //изготовление детали
	const KIND_WORK_ASSEMBLY = 3; //сборка
	
//    public function convertDateExecution()
//    {
//        if ($this->date_exec && ctype_digit ( $this->date_exec )) $this->date_exec = date('d.m', $this->date_exec);
//        return $this;
//    }

}