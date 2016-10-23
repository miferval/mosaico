<?php
define('DOCROOT', dirname(dirname(__FILE__)));
//echo DOCROOT; exit('<h1>Debug line 3</h1>');
require_once(DOCROOT.'/system/bootstrap.php');

!isset($_SESSION['admin']) ? $body_class = 'login' : $body_class = '';
require_once(SYSTEM.'/admin_startup.php');

//var_dump($route);

ob_start('ob_gzhandler');
include $layout;
header('Content-Length: ' . ob_get_length());
echo ob_get_clean();
