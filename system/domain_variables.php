<?php
/**
 * 
 * @package mosaico\system 
 * domain_variables.php
*/
$server = $_SERVER['SERVER_NAME'];

switch ($server) {
	
	default:
		define_safe('TEMPLATE', DOCROOT.'/app/views');
		$hostname 	= 'localhost';
		$username 	= 'root';
		$password 	= '1357miguel';
		$database 	= '';
		$site_name	= 'Mosaico';
		$email		= '';
		$phpmyadmin	= '';
		break;
}
