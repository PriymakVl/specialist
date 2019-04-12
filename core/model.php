<?php

class Model extends Core {

	use ModelStatic;
	
	public $data;
	protected $tableName;
	
	public function __construct($id)
	{
		parent::__construct();
		if ($id) $this->setData($id);
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
        return self::perform($sql, $params)->fetch();
    }
	
	public function getDataArray($id)
	{
		$sql = 'SELECT * FROM `'.$this->tableName.'` WHERE `id` = :id AND `status` = :status';
		$params = ['id' => $id, 'status' => STATUS_ACTIVE];
		return self::perform($sql, $params)->fetch(PDO::FETCH_ASSOC);
	}
	
	public function setData($data)
	{
		if ($this->data) return $this;
		if (is_numeric($data)) $data = $this->getData($data);
		if (!$data) throw new Exception('Нет данных в базе для этого объекта');
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
	
	public function setRating($rating)
    {
        self::perform('UPDATE `'.$this->tableName.'` SET `rating` = ? WHERE id = ?', [$rating, $this->id]);
        return $this;
    }
	
	public function setMessage($type, $key)
	{
		if (!$this->message->section) exit('В классе не указан раздел сообщений');
		$this->message->set($type, $key);
		return $this;
	}

	
}