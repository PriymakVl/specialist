<?php

class User extends UserBase {
	
	use UserStatic;
	
	public function login()
	{
		try {
			return self::loginStatic(trim($this->post->password));
		} catch (Exception $e) {;
			$flag = explode('_', $e->getMessage())[1];//login or password
			$this->setMessage($flag, $e->getMessage());
			return false;
		}
	}


    
	
}























