<?php

class Controller_Terminal extends Controller_Base
{
    public $worker;

    public function __construct()
    {
        parent::__construct();
        $this->view->pathLayout = './views/layouts/terminal.php';
        $this->view->pathFolder = './views/terminal/';
        $this->view->title = 'Терминал';
    }

    public function action_actions()
    {
		$worker = $this->getWorker();
		$actions = (new OrderAction)->getForTerminal();
        $this->render('actions/main', compact('actions', 'worker'));
    }

    public function action_edit_state()
    {
		$action = (new OrderAction)->editState();
		//->checkReadyOrder();
        $this->redirectPrevious();
    }
	
	public function action_add_note()
	{
		$params = ParamTerminal::addNote();
		OrderAction::addNote($params);
		$this->redirect('terminal/actions?action=' . $params['action']);
	}
	
	private function getWorker()
    {
        if ($this->session->id_user) return (new Worker)->setData($this->session->id_user)->setProperties();
        else $this->redirect('main/login');
    }
}