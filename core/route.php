<?php

class Route
{
    private static $controller_name = CONTROLLER_DEFAULT;
    private static $action_name = ACTION_DEFAULT;

	public static function start()
	{
		// контроллер и действие по умолчанию
		//self::$controller_name = CONTROLLER_DEFAULT;
		//self::$action_name = ACTION_DEFAULT;
		
		//убираем из url get параметры
		$url = explode('?', $_SERVER['REQUEST_URI'], 2);
		//разбиваем url
		$routes = explode('/', $url[0]);

		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			self::$controller_name = $routes[1];
		}
		
		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			self::$action_name = $routes[2];
		}

		// добавляем префиксы
		self::$controller_name = 'Controller_'.self::$controller_name;
		self::$action_name = 'action_'.self::$action_name;

		// подцепляем файл с классом контроллера
		$controller_file = strtolower(self::$controller_name).'.php';
		$controller_path = "controllers/".$controller_file;
		
		if(file_exists($controller_path))
		{
			include "controllers/".$controller_file;
		}
		else
		{
			/*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаем редирект на страницу 404
			*/
			Route::ErrorPage404();
		}
		
		// создаем контроллер
		$controller = new self::$controller_name;
		$action = self::$action_name;
		
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			try {
				$controller->$action();
			} catch (Exception $e) {
				exit($e->getMessage());
			}
		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
			Route::ErrorPage404();
		}
	
	}
	
	private static function ErrorPage404()
	{
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		$controller = explode('_', self::$controller_name)[1];
		$action = explode('_', self::$action_name)[1];
		header('Location: /main/404?path='.$controller.'/'.$action);
    }
}