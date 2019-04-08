<?php

class Controller_Main extends Controller_Base {

    public function __construct()
    {
        parent::__construct();
        $this->view->pathLayout = './views/layouts/authorization.php';
    }

	public function action_404()
    {
		$this->view->pathLayout = './views/layouts/default.php';
        $this->render('main/404', ['path' => $this->get->path]);
    }

    public function action_index()
    {
        if (!$this->session->id_user) return $this->redirect('main/login');
        $user = new User($this->session->id_user);
        if ($user->position == User::POSITION_WORKER)return $this->redirect('terminal/actions');
        return $this->redirect('order/list');
    }

    public function action_login()
    {
		if (!$this->post->save) return $this->render('main/login');
        $user = (new User)->login();
        if (!$user) return $this->redirect('main/login?login_error='.$this->post->login);
		return $this->setSession('id_user', $user->id)->redirect('main/index');
    }

    public function action_logout()
    {
        $this->deleteSession('id_user')->redirect('main/login');
    }

}