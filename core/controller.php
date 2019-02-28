<?php
require_once('view.php');
require_once ('./helpers/message.php');
require_once('./helpers/session.php');

class Controller {
	
	public $view;
	public $message;
	
	public function __construct()
	{
        session_start();
		$this->view = new View();
		$this->message = new Message();
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
		exit();
    }
	

}