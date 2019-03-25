<?php

//error_reporting(E_ALL & ~E_WARNING);
error_reporting(E_ALL);
ini_set('display_errors', 'On');

define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root' );
define('DB_PASSWORD', '');
define('DB_NAME', 'specialist');

define('SITE_URL', 'specialist');
define('DEFAULT_CONTROLLER_NAME', 'main');
define('DEFAULT_ACTION_NAME', 'index');

define('STATUS_ACTIVE', 1);
define('STATUS_DELETE', 0);

define('ID_CATEGORY_PRODUCTS', 9); //для показа вида категории только на цилиндрах
define('ID_CATEGORY_CYLINDER', 10);
define('ID_CATEGORY_PRESS', 11);




 