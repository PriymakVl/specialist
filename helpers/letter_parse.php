<?php

require_once ("./models/order.php");
require_once ("./models/customer.php");
require_once ("./helpers/date.php");

class LetterParse {

    public $text;
    public $date;
    public $number = '';
    public $countPacket;
    public $typeOrder;
    public $customer_id;

    public function __construct($type)
    {
        $this->text = Param::get('letter');
        $this->typeOrder = $type;
        $this->parse();
    }

    private function parse()
    {
        $this->parseNumberOrder();
        $this->parseDateExecution();
        $this->parseCustomer();
        //if ($this->typeOrder == Order::TYPE_PACKET) $this->parseCountPacket();
    }

    public function parseNumberOrder()
    {
        preg_match('/1252\d{5}/', $this->text, $matches);
        if (isset($matches[0])) $this->number = $matches[0];
    }

    public function parseDateExecution()
    {
        $pattern = '/\d{1,2}([.,])\s?\d{1,2}\1\s?\d{2,4}/';
        preg_match($pattern, $this->text, $matches);
        if ($matches) {
            $date = str_replace(' ', '', $matches[0]);
            $date = str_replace(',.', '.', $date);
            $date = str_replace('.,', '.', $date);
            $this->date = Date::replaceLongYearForShort($date);
        }
    }

    public function parseCountPacket()
    {

        $patterns = ['/с\\/п\s\s?\d\d?\d?/', '/\\d\d?\d?\s\s?{1,3}с\\/п/'];
        foreach ($patterns as $pattern) {
            preg_match($pattern, $this->text, $matches);
            if ($matches) break;
        }
        if ($matches) preg_match('/\d?\d?\d?/', $matches[0], $count);
        $this->countPacket = $count[0];
    }

    public function parseCustomer()
    {
        $customers = Customer::getAll('customers');
        foreach ($customers as $customer) {
            $result = strripos($this->text, $customer->name);
            if ($result) $this->customer_id = $customer->id;
        }
    }


}