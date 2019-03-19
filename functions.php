<?php

function debug($array, $exit = true) 
{
	if (empty($array)) exit('<br><span style="color: red;">end script</span><br>');
    echo '<br><span style="color: red;">start script</span><br>';
    if(is_array($array) || is_object($array)) {
         echo '<pre>'.print_r($array, true).'</pre>';    
    }
    else var_dump($array);
    echo '<br><span style="color: red;">end script</span><br>';
    if ($exit) exit();    
}

// function __autoload($class_name)
// {
	// $class_name_arr = explode('_', $class_name);
	// if ($class_name_arr[0] == 'Controller') $path_file = './controllers/controller_'.strtolower($class_name_arr[1]).'.php';
	// require_once $path_file;
// }
