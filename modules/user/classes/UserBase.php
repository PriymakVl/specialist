<?php

class UserBase extends Model
{

	public $defaultTypeOrder;
	public $defaultProductAction;
	public $defaultStateOrders;//for show on list orders
	public $options;
	
	const POSITION_SUPER_ADMIN = 1;
	const POSITION_ADMIN = 2;
	const POSITION_BOSS = 3;
	const POSITION_DESINGER = 4;
	const POSITION_MANAGER = 5;
	const POSITION_WORKER = 6;
	
	 const COST_WORK_MINUTE = '0.85';
	 const ACTION_UNIVER = 2;
	 const ACTION_CHPU = 3;
	 const ACTION_FREZ = 4;
	 const ACTION_ASSEMB = 6;
	

}