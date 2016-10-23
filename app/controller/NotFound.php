<?php

class ControllerNotFound extends Controller
{
	function index(){
		header("HTTP/1.0 404 Not Found");
		include TEMPLATE.'/404.php';
		

	}
}