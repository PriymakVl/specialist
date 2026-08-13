<?php

class User extends UserBase {
	
	use UserAuthorization, UserModel;
	
	public function login()
	{
		try {
			return $this->getUserByLogin();
		} catch (Exception $e) {
			debug($e);
			$flag = explode('_', $e->getMessage())[1];//login or password
			debug($flag);
			$this->setMessage($flag, $e->getMessage());
			return false;
		}
	}


    
	
}























