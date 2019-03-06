<?php
require_once('./core/model.php');

class OrderActionBase extends Model {

	public $product;
	public $order;
	public $convertState;
	public $action;//объект операции обработки
	public $bgState;
	public $bgTerminalBox;
	
	const BG_TERMINAL_BOX_PLAN = 'yellow';
	const BG_TERMINAL_BOX_PROGRESS = 'green';
	const BG_TERMINAL_BOX_STOPPED = 'red';
	
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
	
	public function setBgTerminalBox()
	{
		if ($this->state == OrderActionState::PROGRESS) $this->bgTerminalBox = self::BG_TERMINAL_BOX_PROGRESS;
		else if ($this->state == OrderActionState::STOPPED) $this->bgTerminalBox =  self::BG_TERMINAL_BOX_STOPPED;
		else $this->bgTerminalBox = self::BG_TERMINAL_BOX_PLAN;
		return $this;
	}
	
	public function getOrder()
	{
		$this->order = new Order($this->id_order);
		return $this;
	}

	


	
	
}























