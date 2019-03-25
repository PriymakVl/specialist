<?php

class Model extends Core {

	use ModelStatic;
	
	public $data;
	protected $tableName;
	
	public function __construct($id)
	{
		parent::__construct();
		if ($id) $this->getData($id);
	}

	public function __set($name, $value) 
	{
		if ($this->data->$name) $this->data->$name = $value;
	}
 
	public function __get($name) 
	{
		if ($this->data->$name) return $this->data->$name;
	}

    public function getData($id)
    {
        $sql = 'SELECT * FROM `'.$this->tableName.'` WHERE `id` = :id AND `status` = :status';
		$params = ['id' => $id, 'status' => STATUS_ACTIVE];
        $this->data = self::perform($sql, $params)->fetch();//PDO::FETCH_ASSOC
		return $this;
    }
	
	public function setData($data)
	{
		$this->data = $data;
		return $this;
	}

    public function delete()
    {
		$sql = 'UPDATE `'.$this->tableName.'` SET `status` = :status WHERE id = :id';
		$params = ['status' => STATUS_DELETE, 'id' => $this->id];
		self::perform($sql, $params);
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
	
	public function setMessage($type, $key)
	{
		if (!$this->message->section) exit('В классе не указан раздел сообщений');
		$this->message->set($type, $key);
		return $this;
	}

	
}