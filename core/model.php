<?php
require_once('model_static.php');

class Model extends ModelStatic {

	public $sql;
	protected $stmt;
	public $data;
	protected $tableName;
	
	public function __construct($id = null)
	{
		if ($id) $this->getData($id);
		//$this->messages = parse_ini_file('/messages.ini', true);
	}

	public function __set($name, $value) 
	{
		if ($this->data[$name]) $this->data[$name] = $value;
	}
 
	public function __get($name) 
	{
		if ($this->data[$name]) return $this->data[$name];
	}

    public function getData($id)
    {
        $sql = 'SELECT * FROM `'.$this->tableName.'` WHERE `id` = ? AND `status` = ?';
        $this->data = self::perform($sql, [$id, self::STATUS_ACTIVE])->fetch(PDO::FETCH_ASSOC);
    }

    public function delete()
    {
        self::perform('UPDATE `'.$this->tableName.'` SET `status` = '.self::STATUS_DELETE.' WHERE id = ?', [$this->id]);
        return $this;
    }

    public function setState($state)
    {
        self::perform('UPDATE `'.$this->tableName.'` SET `state` = ? WHERE id = ?', [$state, $this->id]);
        return $this;
    }

    public function setKind($kind)
    {
        self::perform('UPDATE `'.$this->tableName.'` SET `kind` = ? WHERE id = ?', [$kind, $this->id]);
        return $this;
    }

    public function setType($type)
    {
        self::perform('UPDATE `'.$this->tableName.'` SET `type` = ? WHERE id = ?', [$type, $this->id]);
        return $this;
    }
	
}