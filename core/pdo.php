<?php
require_once('./config.php');

class PHPDataObject {
	
	protected static function getConnectionDatabase()
	{
		$host = 'localhost';
		$charset = 'utf8';
		$dbname = DB_NAME;
		
		$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
		
		//$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING];

		$options = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,//PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::ATTR_PERSISTENT => true,//permanent connection to the database
		];

		return new PDO($dsn, USER, PASSWORD, $options);
	}

}