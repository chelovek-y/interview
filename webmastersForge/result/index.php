<?php 

//ini_set("display_errors",0); - для рабочей верссии 
ini_set("display_errors",1);// для тестовой версии
ini_set("error_reporting",E_ALL & ~E_NOTICE & ~E_STRICT);

require_once 'Controller.php';
require_once 'Model.php';
require_once 'View.php';

$controller = new Controller() ;