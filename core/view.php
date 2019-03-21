<?php

class View {

	public $footer = 'footer.php';
	public $pathFolder = './views/';
	public $pathLayout = './views/layouts/base.php';
	public $title = 'Главная страница';
	public $message;
	public $params;
	public $get;
	public $post;
	public $session;
	
	public function __construct()
	{
		$this->message = new Message();
		$this->message->get();
		$this->params = Param::getAll();
		$this->get = new ArrayGet;
		$this->post = new ArrayPost();
		$this->session = new ArraySession();
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
		require ($this->pathLayout);
	}

	public function renderPart($path, $data = null)
    {
        $path = $path.'.php';
        if ($data) extract($data);
        require $path;
    }

//	public function renderWithLayout($layout, $content, $data = null)
//    {
//        $content = $content.'.php';
//        if ($data) extract($data);
//        include_once('./views/layouts/'.$layout.'.php');
//        exit();
//    }

}