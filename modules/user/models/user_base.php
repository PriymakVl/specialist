<?php
require_once('./core/model.php');
require_once ('./helpers/date.php');
require_once ('./helpers/message.php');
require_once ('./helpers/helper.php');
require_once ('user_options.php');


class UserBase extends Model
{

	public $defaultTypeOrder;
	public $defaultKindWork;
	
	const POSITION_WORKER = 1;
	

}