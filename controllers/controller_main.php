<?php

require_once('controller_base.php');

class Controller_Main extends Controller_Base {

    public function __construct()
    {
        parent::__construct();
        $this->view->pathLayout = './views/layouts/authorization.php';
    }

	public function action_404()
    {
        $path = Param::get('path');
		$this->view->pathLayout = './views/layouts/base.php';
        $this->render('main/404', compact('path'));
    }

    public function action_index()
    {
        if (!$this->session->id_user) return $this->redirect('main/login');
        $user = new User($this->session->id_user);
        if ($user->position == User::POSITION_WORKER) $this->redirect('terminal/actions');
        else $this->redirect('order/list');
    }

    public function action_login()
    {
		if (!$this->post->save) return $this->render('main/login');
        $user = (new User)->login();
        if (!$user) $this->redirect('main/login?login_error='.$this->post->login);
        Session::set('id_user', $user->id);
        $this->redirect('main/index');
    }

    public function action_logout()
    {
        Session::delete('id_user');
        $this->redirect('main/login');
    }

}