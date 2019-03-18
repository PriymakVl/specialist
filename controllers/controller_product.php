<?php
require_once('controller_base.php');

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
		$id_active = Session::get('product-active');
		$product = new Product(Param::get('id_prod'));
		$product->getSpecification()->getSpecificationChildren()->getSpecificationGroup()->getParent()->getActions()->countTimeManufacturing()->getStatistics()->getDrawings();
		$this->render('index/main', compact('product', 'id_active'));
	}

	public function action_add()
    {
        $params = ParamProduct::add();
		if (empty($params['save'])) return $this->render('add/main', compact('params'));
		$id_add = Product::add($params);
		$this->message->set('success', 'add');
		Session::set('product-active', $id_add);
		$this->redirect('product?id_prod='.$params['id_parent']);
    }
	
	public function action_edit()
    {
		$product = new Product(Param::get('id'));
		$params = ParamProduct::edit($product);
		if (empty($params['save'])) return $this->render('edit/main', compact('product'));
		if (empty($params['edit_all'])) Product::editOne($params);
		else Product::editAll($params);
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
		$id_prod = Param::get('id_prod');
		Session::set('product-active', $id_prod);
        $this->redirectPrevious();
	}
	
	public function action_delete()
	{
		$product = new Product(Param::get('id'));
		$product->delete();
		$this->redirect('product?id_prod='.$product->id_parent);
	}

    
	
}