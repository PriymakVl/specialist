<?php
require_once('product_base.php');

class ProductTime extends ProductBase {


    public static function get($symbol)
    {
        $sql = 'SELECT `time_prod`, `time_prepar` FROM `product_times` WHERE `symbol` = :symbol AND `status` = :status';
        $params = ['symbol' => $symbol, 'status' => self::STATUS_ACTIVE];
        return self::perform($sql, $params)->fetch();
    }
	
	// private static function convertTime($result)
	// {
		// $result->time_prod = date('i:s', $result->time_prod);
		// $result->time_prepar = date('i:s', $result->time_prepar);
		// return $result;
	// }
}