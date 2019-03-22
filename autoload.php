<?php

function autoload_core ($class_name) 
{
	switch($class_name) {
		case 'DB': return require './core/db.php';
		case 'Model': return require './core/model.php';
		case 'ModelStatic': return require './core/.php';
		case 'Route': return require './core/route.php';
		case 'View': return require './core/view.php';
		case 'Controller': return require './core/controller.php';
		case 'Param': return require './core/param.php';
	}
}

function autoload_controller($class_name)
{
	$class_name_arr = explode('_', $class_name);
	if ($class_name_arr[0] != 'Controller') return;
	$path_file = './controllers/controller_'.strtolower($class_name_arr[1]).'.php';
	require_once $path_file;
}

function autoload_class($class_name) {
	$result = preg_match_all('((?:^|[A-Z])[^A-Z]*)', $class_name, $matches);
	$array = call_user_func_array('array_merge', $matches);
	$module_name = strtolower($array[1]);
	$modules = ['order', 'order_action'];
	if (!in_array($module_name, $modules);
	$file_name = implode('_', $array);
	$file = strtolower(trim($file_name, '_')).'.php';
	$path = './modules/'.$module_name.'/classes/'.$file;
	require $path;
}

spl_autoload_register('autoload_core', true);
spl_autoload_register('autoload_controller', true);
spl_autoload_register('autoload_class', true);
//spl_autoload_register('autoload_trait', true);
//spl_autoload_register('autoload_helper', true);
