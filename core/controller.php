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
        return $this->view->render($template, $data, $this->view);
		exit();
    }
	

}