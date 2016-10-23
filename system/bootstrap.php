<?php
/**
 * @package mosaico
 */
require_once('lib/functions.php');
require_once('defines.php');
require_once('domain_variables.php');
include CONFIG;
require_once('core/registry.php');
require_once('core/controller.php');
require_once('core/model.php');
require_once('core/loader.php');

require_once('lib/session.php');
require_once('lib/request.php');
require_once('lib/utilities.php');

require_once('database/drivers/mysqli.php');
require_once('database/db.php');

$filename =  DOCROOT.'/vendor/autoload.php';
//Vendor Packages
if (file_exists($filename)) {
    include VENDOR.'/autoload.php';
} else {
    exit('<h1>First You need to run composer update</h1>');
}


// Registry
$registry = new Registry();

//Utility
$utility	= new Utility($registry);
$registry->set('utility', $utility);

// Loader //comment Se necesita en APP y Admin?
$loader = new Loader($registry);
$registry->set('load', $loader);

$registry->set('settings', $settings);

//GET //used in session.php TODO change this?
isset($_GET['route']) ? $route = $_GET['route'] : $route = '';

if(!empty($settings['database']['db'])){
	// Database
	$db = new db($settings['database']['driver'],
					$settings['database']['host'],
					$settings['database']['user'],
					$settings['database']['password'],
					$settings['database']['db']);
	$registry->set('db', $db);

	// Session
	$session = new Session();
	$registry->set('session', $session);
	require_once('sessions.php');
	//Register user_id
	if(isset($_SESSION['admin'])){

	}
}
//Set default timezone from config.php
date_default_timezone_set($settings['region']['timezone']);


