<?php
require_once('./core/model.php');
require_once ('./helpers/date.php');
require_once ('./helpers/message.php');
require_once ('./helpers/helper.php');
require_once('./modules/specification/models/specification.php');
require_once('./modules/product/models/product.php');
require_once ('order_content.php');

class OrderBase extends Model
{

//    public function convertDateExecution()
//    {
//        if ($this->date_exec && ctype_digit ( $this->date_exec )) $this->date_exec = date('d.m', $this->date_exec);
//        return $this;
//    }

}