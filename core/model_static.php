<?php
require_once('db.php');

class ModelStatic extends DB {

    const STATUS_DELETE = 0;
    const STATUS_ACTIVE = 1;

    protected static function perform($sql, $params = null)
    {
        $pdo = parent::getInstance();
        if ($params) {
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
        }
        else $stmt = $pdo->query($sql);
        return $stmt;
    }

    public static function getAll($table_name)
    {
        $sql = 'SELECT * FROM `'.$table_name.'` WHERE `status`= :status';
		$params = ['status' => self::STATUS_ACTIVE];
        return self::perform($sql, $params)->fetchAll();
    }
	
	public static function update($sql, $params) 
	{
		return self::perform($sql, $params)->rowCount();
	}
	
	public static function insert($sql, $params)
	{
		self::perform($sql, $params);
		return self::perform("SELECT LAST_INSERT_ID()")->fetchColumn();
	}
		

    protected static function bildSelect($params, $table_name, $sql = null)
    {
        if ($sql) $sql = $sql.$table_name;
        else $sql = 'SELECT * FROM '.$table_name;
        $where = self::bildWhere($params);
        return $sql.$where;
    }

    protected static function bildWhere($params)
    {
        if (empty($params)) return '';
        $where = ' WHERE ';
        $keys = array_keys($params);
        foreach ($keys  as $key) {
            $where = $where.'`'.$key.'` = :'.$key.' AND ';

        }
        return rtrim($where, ' AND ');
    }

    public static function getLastInsertId()
    {
        return self::perform("SELECT LAST_INSERT_ID()")->fetchColumn();
    }
	
	public static function getLastId($table)
	{
		$sql = 'SELECT MAX(id) AS id FROM '.$table;
		return self::perform($sql)->fetchColumn();
	}
	
	public static function selectParams($params_all, $keys) 
	{
		$params = [];
        foreach ($keys as $key) {
            if (isset($params_all[$key])) $params[$key] = $params_all[$key];
        }
        return $params;
	}
	
}