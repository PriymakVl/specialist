<?php
require_once('./core/model.php');

class DataAction extends Model {

	public function __construct($id)
    {
        $this->tableName = 'data_actions';
        parent::__construct($id);
    }

    public static function get($id)
    {
        $sql = 'SELECT * FROM 	`data_actions` WHERE `id` = :id';
        $params = ['id' => $id];
        return self::perform($sql, $params)->fetch();
    }
	
}