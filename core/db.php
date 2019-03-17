<?php
require_once('./config.php');

class DB {
	
	private  static $_instance = null;
	
	private static function getPdo () {
		
		$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
		$options = self::getOptions();
		self::$_instance = new PDO($dsn, DB_USER, DB_PASSWORD, $options);
	}

	private static function getOptions()
	{
		//$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING];

		$options = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,//PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::ATTR_PERSISTENT => true,//permanent connection to the database
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
		];

		return $options;
	}

	protected static function getInstance()
	{
		if (self::$_instance != null) return self::$_instance;
		else {
			self::getPdo();
			return self::$_instance;
		}
	}

}