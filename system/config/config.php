<?php
/**
 *Config Settings
 */

//Database string
$settings['database'] = array(
			'driver'		=> 'MySQLi',
			'host' 			=> $hostname,
			'port' 			=> '3306',
			'user' 			=> $username,
			'password'		=> $password,
			'db' 			=> $database,
			'tbl_prefix'	=> '');

//SITE variables
$settings['site'] = array(
			'name' => $site_name);

//TIME settings
$settings['region'] = array(	
			'time_format' 	=> 'g:i a',
			'date_format'	=> 'm/d/Y',
			'timezone' 		=> 'America/Chicago'
		);
