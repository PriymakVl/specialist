<?php
require_once('view.php');
require_once ('./helpers/message.php');
require_once ('./helpers/param.php');
require_once ('./modules/user/models/user.php');
require_once('./helpers/session.php');

class Controller {
	
	public $view;
	protected $sectionMessages;
	
	public function __construct()
	{
        session_start();
		$this->view = new View();
	}

	protected function redirect($url = '')
    {
        header("Location: /".$url);
        exit();
    }

    protected function redirectPrevious()
    {
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    }

    protected function render($template, $data = null)
    {
        return $this->view->render($template, $data, $this->view);
    }

    protected function setMessage($key, $type = 'error')
    {
        Message::setSession($type, $this->sectionMessages, $key);
    }
	

}