<?php
require_once('controller_base.php');

class Controller_Drawing extends Controller_Base {

    public function __construct()
    {
        parent::__construct();
        $this->view->pathFolder = './modules/drawing/views/';
		$this->view->title = 'Чертежи';
		$this->message->section = 'drawing';
    }

    public function action_list()
	{
		$id_prod = Param::get('id_prod');
		$product = new Product($id_prod);
		$product->getDrawings();
		$this->render('/product?id_prod'.$params['id_prod'], compact('product'));
	}

	public function action_add()
    {
        $params = ParamDrawing::add();
		if (empty($params['save'])) return $this->render('add/main', compact('params'));
		$result = Drawing::add($params);
		if ($result) $this->message->set('success', 'add');
		else $this->message->set('error', 'add-error');
		$this->redirect('product?tab=5&id_prod='.$params['id_prod']);
    }
	
	public function action_delete()
	{
		$dwg = new Drawing(Param::get('id_dwg'));
		$dwg->delete()->setMessage('success', 'delete');
		$this->redirect('product?tab=5&id_prod='.$dwg->id_prod);
	}
	
	public function action_edit_note()
	{
		$params = ParamDrawing::note();
		$dwg = new Drawing($params['id_dwg']);
		if (empty($params['save'])) return $this->render('edit_note/main', compact('dwg'));
		$dwg->editNote($params)->setMessage('success', 'edit-note');
		$this->redirect('product?tab=5&id_prod='.$dwg->id_prod);
	}

    
	
}