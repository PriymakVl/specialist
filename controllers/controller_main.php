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
        $this->render('main/404', compact('path'));
    }

    public function action_index()
    {
        $id_user = Session::get('id_user');
        if (empty($id_user)) return $this->redirect('main/login');
        $user = new User($id_user);
        if ($user->position == User::POSITION_WORKER) $this->redirect('terminal/actions');
        else $this->redirect('order/list');
    }

    public function action_login()
    {
        $params = Param::getAll(['login', 'password']);
        if ($params) $user = UserStatic::authorisation($params);
        else $user = false;
        if ($user) {
            Session::set('id_user', $user->id);
            $this->redirect('main/index');
        }
        $this->render('main/login');
    }

    public function action_logout()
    {
        Session::delete('id_user');
        $this->redirect('main/login');
    }

}