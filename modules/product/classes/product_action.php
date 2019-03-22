<?php
require_once('product_base.php');

class ProductAction extends ProductBase {

	public $name;
	public $price;
	
	public function __construct($id_prod_action)
    {
        $this->tableName = 'product_actions';
        parent::__construct($id_prod_action);
		$this->setProperties();
    }

    public static function getAllBySymbol($symbol_prod)
    {
        $sql = 'SELECT `id` FROM `product_actions` WHERE `symbol` = :symbol AND `status` = :status ORDER BY `number`';
        $params = ['symbol' => $symbol_prod, 'status' => self::STATUS_ACTIVE];
        $ids = self::perform($sql, $params)->fetchAll();
		return self::createArrayOfActions($ids);
    }
	
	private static function createArrayOfActions($ids)
    {
        return Helper::createArrayOfObject($ids, 'ProductAction');
    }
	
	public function setProperties()
	{
		$data = DataAction::get($this->id_data);
		$this->name = $data->name;
		$this->price = $data->price;
	}
	
	
	public static function add($params)
	{
		unset($params['save'], $params['id_prod']);
        $sql = 'INSERT INTO `product_actions` (symbol, id_data, time_prod, time_prepar, number) 
			VALUES (:symbol, :id_data, :time_prod, :time_prepar, :number)';
        return self::insert($sql, $params); 
	}
	
	public static function edit($params)
	{
		unset($params['save'], $params['id_prod']);
        $sql = 'UPDATE `product_actions` SET `time_prod` = :time_prod, `time_prepar` = :time_prepar, `number` = :number, `id_data` = :id_data WHERE id = :id';
		return self::perform($sql, $params); 
	}
	
	public static function deleteOne($id)
    {
		$sql = 'UPDATE `product_actions` SET `status` = :status WHERE id = :id';
		$params = ['status' => self::STATUS_DELETE, 'id' => $id];
		return self::perform($sql, $params);
    }
	

	
}