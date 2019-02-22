<?php
require_once('product_base.php');

class ProductAction extends ProductBase {

	public $name;
	
	public function __construct($id_prod_action)
    {
        $this->tableName = 'product_actions';
        parent::__construct($id_prod_action);
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
        $actions = Helper::createArrayOfObject($ids, 'ProductAction');
		foreach ($actions as $action) {
			$action->setName();
		}
		return $actions;
    }
	
	public function setName()
	{
		$this->name = Action::getName($this->id_action);
		return $this;
	}
	
	
	public static function add($params)
	{
        $sql = 'INSERT INTO `product_actions` (symbol, id_action, time_prod, time_prepar, number) 
			VALUES (:symbol, :id_action, :time_prod, :time_prepar, :number)';
        return self::insert($sql, $params); 
	}
	
	public static function edit($params)
	{
        $sql = 'UPDATE `product_actions` SET `time_prod` = :time_prod, `time_prepar` = :time_prepar, `number` = :number WHERE id = :id_prod_action';
		return self::perform($sql, $params); 
	}
	
	public static function deleteOne($id_action)
    {
		$sql = 'UPDATE `product_actions` SET `status` = :status WHERE id = :id_action';
		$params = ['status' => self::STATUS_DELETE, 'id_action' => $id_action];
		return self::perform($sql, $params);
    }
	

	
}