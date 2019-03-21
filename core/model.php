<?php
require_once('model_static.php');

class Model extends ModelStatic {

	public $sql;
	protected $stmt;
	public $data;
	protected $tableName;
	public $message;
	public $params;
	public $get;
	public $post;
	public $session;
	
	public function __construct($id)
	{
		if ($id) $this->getData($id);
		$this->message = new Message();
		$this->params = Param::getAll();
		$this->get = new ArrayGet;
		$this->post = new ArrayPost();
		$this->session = new ArraySession();
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
        $sql = 'SELECT * FROM `'.$this->tableName.'` WHERE `id` = :id AND `status` = :status';
		$params = ['id' => $id, 'status' => self::STATUS_ACTIVE];
        $this->data = self::perform($sql, $params)->fetch(PDO::FETCH_ASSOC);
		return $this;
    }

    public function delete()
    {
		$sql = 'UPDATE `'.$this->tableName.'` SET `status` = :status WHERE id = :id';
		$params = ['status' => self::STATUS_DELETE, 'id' => $this->id];
		self::perform($sql, $params);
        return $this;
    }

    // public function setState($state)
    // {
        // self::perform('UPDATE `'.$this->tableName.'` SET `state` = ? WHERE id = ?', [$state, $this->id]);
        // return $this;
    // }

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
	
	// public function setId($id)
	// {
		// if (empty($id)) throw new Exception('Нет id при создании класса '.__CLASS__);
		// $this->id = $id;
		// return $this;
	// }
	
}