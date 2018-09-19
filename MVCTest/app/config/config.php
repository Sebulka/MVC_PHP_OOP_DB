<?php
//app roots define
define('ROOT', dirname(dirname(__FILE__)));
define('DS', DIRECTORY_SEPARATOR);
define('URLROOT', $_SERVER['HTTP_HOST'].'/MVCTest/app');

//Data base define
define('HOST', '');
define('DB_NAME', '');
define('DB_USER_NAME', '');
define('DB_PASSWORD', '');
define('DNS', 'mysql:host='.HOST.';dbname='.DB_NAME);

