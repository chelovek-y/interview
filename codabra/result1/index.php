<?php
//require 'config.php';
ini_set("display_errors",1);
ini_set("error_reporting",E_ALL & ~E_NOTICE & ~E_STRICT);
require_once 'includes/functions.php';

require_once 'core/controllerCore.php';
require_once 'core/modelCore.php';
require_once 'core/viewCore.php';

require_once 'controller.php';
$controller = new Controller($conf) ;






