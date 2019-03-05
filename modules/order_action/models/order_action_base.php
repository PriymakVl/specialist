<?php
require_once('order_base.php');

class OrderActionBase extends OrderBase {

	public $product;
	public $order;
	public $convertState;
	public $action;//объект операции обработки
	public $bgState;
	
	public function convertState()
	{
		$this->convertState = ParamOrderAction::convertStateWork($this->state);
		return $this;
	}
	
	public function setBgState()
	{
		$this->bgState = ParamOrderAction::getBgStateWork($this->state);
		return $this;
	}
	
	public function startWork($params)
	{
		OrderActionState::add($params);
		self::setStateStartWork($params);
		return $this;
	}
	
	public function stopWork($params)
	{
		OrderActionState::add($params);
		self::setStateStopWork($params);
		return $this;
	}
	
	public function endWork($params)
	{
		OrderActionState::add($params);
		self::setStateEndWork($params);
		return $this;
	}
	


	
	
}























