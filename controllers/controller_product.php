<?php

class Controller_Product extends Controller_Base {

    public function __construct()
    {
        parent::__construct();
        $this->view->pathFolder = './modules/product/views/';
		$this->view->title = 'Производство';
		$this->message->section = 'product';
    }

    public function action_index()
	{
		$product = (new Product)->getData($this->get->id_prod)->getSpecification()->getSpecificationChildren()->getSpecificationGroup();
		$product->getParent();
		//->getActions()->countTimeManufacturing()->getStatistics()->getDrawings()
		$this->render('index/main', compact('product'));
	}

	public function action_add()
    {
		if (!$this->post->save) return $this->render('add/main', compact('params'));
		$product = (new Product)->addData()->setMessage('success', 'add');
		$this->setSession('id_prod_active', $product->id)->redirect('product?id_prod='.$product->id_parent);
    }
	
	public function action_edit()
    {
		$product = new Product($this->get->id_prod);
		if (!$this->post->save) return $this->render('edit/main', compact('product'));
		$product->edit()->setMessage('success', 'edit');
		$this->redirect('product?id_prod='.$product->id);
    }
	
	public function action_copy()
	{
		$params = ParamProduct::copy();
		if (empty($params['id_parent'])) { 
			$this->message->set('error', 'copy-not-parent'); /***/ return $this->redirectPrevious(); 
		}
		Product::add($params);
		$this->message->set('success', 'copy');
		$this->redirect('product?id_prod='.$params['id_parent']);
	}
	
	public function action_activate()
	{
		$this->setSession('id_prod_active', $this->get->id_prod)->redirectPrevious();
	}
	
	public function action_delete()
	{
		$product = (new Product)->getData($this->get->id_prod)->getSpecification()->delete();
		$this->setMessage('success', 'delete')->redirect('product?id_prod='.$product->id_parent);
	}

    
	
}