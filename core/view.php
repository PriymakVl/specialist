<?php

class View extends Core {

	public $footer = 'footer.php';
	public $pathFolder = './views/';
	public $pathLayout = './views/layouts/default.php';
	public $title = 'Главная страница';
	
	public function __construct()
	{
		parent::__construct();
		$this->message->get();
	}

	public function render($content, $data, $view)
	{
        $content = $this->pathFolder.$content.'.php';
        $title = $this->title;
		$message = $this->message;
		$get = $this->get;
		$post = $this->post;
		$params = $this->params;
		$session = $this->session;
        if ($data) extract($data);
		return require ($this->pathLayout);
	}

	public function renderPart($path, $data = null)
    {
        $path = $path.'.php';
        if ($data) extract($data);
        require $path;
    }

}