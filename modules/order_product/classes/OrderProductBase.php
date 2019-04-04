<?php

class OrderProductBase extends Model {
	
    const STATE_PROGRESS = 1; //работа выполняется
    const STATE_STOPPED = 2; //работа остановлена по какой то причине
    const STATE_ENDED = 3; //работа закончена
    const STATE_WAITING = 4; //отложена
	
	const ID_MAIN_PARENT = 0;
	
	public $options;
	public $actions;
	public $stateString;
	public $stateBg;
	public $order;
	public $parent;
	public $type;
	
	public $specification;
	public $specificationGroup;
	public $specificationAll; //on all levels
	
		//for convert specification
	public function setTypeProduct()
	{
		$this->type = $this->options->type;
		return $this;
	}
	
	public function getOptions()
	{
		$this->options = (new Product)->getData($this->id_prod);
		return $this;
	}
}























