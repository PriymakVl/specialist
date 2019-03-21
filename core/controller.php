<?php
require_once('view.php');
require_once ('./helpers/message.php');
require_once('./helpers/session.php');
require_once 'param.php';
require_once 'array_post.php';
require_once 'array_get.php';
require_once 'array_session.php';

class Controller {
	
	protected $view;
	protected $message;
	protected $params;
	protected $get;
	protected $post;
	protected $session;
	
	public function __construct()
	{
        session_start();
		$this->view = new View;
		$this->message = new Message;
		$this->params = Param::getAll();
		$this->get = new ArrayGet;
		$this->post = new ArrayPost();
		$this->session = new ArraySession();
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