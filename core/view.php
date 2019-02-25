<?php

class View {

	public $footer = 'footer.php';
	public $pathFolder = './views/';
	public $pathLayout = './views/layouts/base.php';
	public $title = 'Главная страница';

	public function render($content, $data, $view)
	{
        $content = $this->pathFolder.$content.'.php';
        $title = $this->title;
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