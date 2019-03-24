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
}