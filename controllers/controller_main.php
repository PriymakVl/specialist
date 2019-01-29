<?php

require_once('./core/controller.php');

class Controller_Main extends Controller {

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
        //if (isset($_COOKIE['username'])) $this->redirect('order/list');
        $this->render('main/login');
    }

    public function action_login()
    {
        $password = Param::get('password');
        $user = User::getByPassword($password);
        if ($user) {
            //setcookie('username', $user->name);
            $this->redirect('order/list');
        }
        else $this->redirect();
    }

//    public function action_logout()
//    {
//        unset($_COOKIE['username']);
//        setcookie('username', "", time()-3600);
//        $this->redirect('main/login');
//    }

}