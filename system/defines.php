<?php
/**
* defines.php
* @package mosaico
* version 1.0.0 10/21/2016
*/
 
//FOLDER
define_safe('FOLDER', '/mosaico_dev'); 
 //Base
define_safe('BASE', FOLDER.'/'); 
//To prevent direct access
define_safe('__IN_MOSAIC__', true);

//System Folder
define_safe('SYSTEM', DOCROOT.'/system');

//Vendor
define_safe('VENDOR', DOCROOT.'/vendor');

//cache
define_safe('DIR_CACHE', SYSTEM.'cache' );

//Config File inside the system folder
define_safe('CONFIG',  SYSTEM. '/config/config.php');

/*/////////////////APP/////////////////*/
//aplication folder
define_safe('APP_FOLDER', FOLDER.'/app');
//views folder
define_safe('APP_VIEWS', FOLDER.'/app/views');

/*///////////////ADMIN/////////////////////*/
define_safe('BASE_ADMIN', FOLDER.'/admin/');
//aplication folder
define_safe('ADMIN_FOLDER', FOLDER.'/admin');
//views folder
define_safe('ADMIN_VIEWS', FOLDER.'/admin/views');
//Upload
define_safe('UPLOAD_FOLDER', FOLDER.'/app/uploads/');

