<?php

class Controller_Product extends Controller_Base {

    public function __construct()
    {
        parent::__construct();
        $this->view->pathFolder = './modules/product/views/';
		$this->view->title = 'Продукция';
		$this->message->section = 'product';
    }

    public function action_index()
	{
		
		$product = (new Product)->setData($this->get->id_prod)->getParent()->getSpecification()->getSpecificationChildren();
		if ($product->id != ID_CATEGORY_PRODUCTS && $product->id != ID_CATEGORY_CYLINDER && $product->id != ID_CATEGORY_PRESS) {
			$product->convertProperties()->getDrawings()->getActions()->calculateTimePlan()->calculateTimeAverage();
			if ($product->symbol) $product->getOrderProducts();
		}
		$this->render('index/main', compact('product'));
	}

	public function action_add()
    {
		$parent = new Product($this->get->id_parent);
		if (!$this->post->save) return $this->render('add/main', compact('parent'));
		$product = (new Product)->addData()->setMessage('success', 'add');
		if ($parent->type == Product::TYPE_DETAIL) $parent->setType(Product::TYPE_UNIT);
		$this->setSession('id_prod_active', $product->id)->redirect('product?id_prod='.$product->id_parent);
    }
	
	public function action_edit()
    {
		$product = (new Product)->setData($this->get->id_prod);
		if (!$this->post->save) return $this->render('edit/main', compact('product'));
		$product->edit()->setMessage('success', 'edit');
		$this->redirect('product?id_prod='.$product->id);
    }
	
	public function action_copy()
	{
		if (!$this->session->id_prod_active) return $this->message->set('error', 'copy-not-parent')->redirectPrevious(); 
		(new Product)->setData($this->get->id_prod)->copy()->setMessage('success', 'copy');
		$this->redirect('product?id_prod='.$this->session->id_prod_active);
	}

	public function action_move()
	{
		if (!$this->session->id_prod_active) return $this->message->set('error', 'copy-not-parent')->redirectPrevious(); 
		(new Product)->setData($this->get->id_prod)->move()->setMessage('success', 'move');
		$this->redirect('product?id_prod='.$this->session->id_prod_active);
	}
	
	public function action_activate()
	{
		$this->setSession('id_prod_active', $this->get->id_prod)->redirectPrevious();
	}
	
	public function action_delete()
	{
		$product = (new Product)->setData($this->get->id_prod)->getSpecification()->deleteAll();
		$this->setMessage('success', 'delete')->redirect('product?id_prod='.$product->id_parent);
	}
	
	 public function action_search()
	 {
		 $products = (new Product)->search();
		 if (count($products) == 1) return $this->setMessage('success', 'found', 'product_search')->redirect('product?id_prod='.$products[0]->id);
		 else if (count($products ) > 1) $this->setMessage('success', 'found_next', 'product_search')->render('search/main', compact('products'));
		 else $this->setMessage('error', 'not_found', 'product_search')->redirectPrevious();
	 }

    
	
}