<?php

class Core {
	
	use Param;
	
	protected $message;
	protected $params;
	protected $get;
	protected $post;
	protected $session;
	
	public function __construct()
	{
		$this->message = new Message;
		$this->get = new GlobalArray($_GET);
		$this->post = new GlobalArray($_POST);
		$this->session = new GlobalArray($_SESSION);
		$this->params = self::getParams();
	}
	
	public function setSession($key, $value)
	{
		if (!$key || !$value) throw new Exception('Нет ключа или значения для созданя сессии');
		$_SESSION[$key] = $value;
		return $this;
	}
	
	public function deleteSession($key)
	{
		if (empty($_SESSION[$key])) throw new Exception('В сессии нет указанного ключа');
		unset($_SESSION[$key]);
		return $this;
	}
}