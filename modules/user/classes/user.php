<?php

class User extends UserBase {
	
	use UserAuthorization, UserModel;
	
	public function login()
	{
		try {
			return $this->getUserByLogin();
		} catch (Exception $e) {;
			$flag = explode('_', $e->getMessage())[1];//login or password
			$this->setMessage($flag, $e->getMessage());
			return false;
		}
	}


    
	
}























