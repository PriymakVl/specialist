<?php

class Action extends Model {

	public function __construct($id = false)
    {
        $this->tableName = 'actions';
        parent::__construct($id);
		$this->message->section = 'action';
    }
	
	public function getArrayNames()
	{
		$sql = 'SELECT `name` FROM `actions` WHERE `status` = :status';
		return self::perform($sql, ['status' => STATUS_ACTIVE])->fetchAll(PDO::FETCH_COLUMN);
	}
	
}