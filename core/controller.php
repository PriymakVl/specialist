<?php

class Controller extends Core {
	
	protected $view;
	
	public function __construct()
	{
		parent::__construct();
		$this->view = new View;
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
        return $this->view->render($template, $data);
		exit();
    }
	
	protected function setMessage($type, $key, $section = false) 
	{
		$section = $section ? $section : $this->message->section;
		if (!$section) throw new Exception('Не указан раздел сообщений');
		$this->message->section = $section;
		$this->message->set($type, $key);
		return $this;
	}
	
	protected function setTitle ($title)
	{
		$this->view->title = $title;
		return $this;
	}
	

}