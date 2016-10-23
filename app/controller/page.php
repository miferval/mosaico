<?php
/*
 *Controler for static pages
 */

class ControllerPage extends Controller
{
	protected $router;
	protected $registry;
	public function __construct($registry,$router)
    {
	$this->router = $router;
	$this->registry = $registry;
	
	}
	public function index(){
		switch ($this->router['page']) {
			case 'contact':
					include TEMPLATE.'/pages/contact.php';
				break;
			case 'about':
					include TEMPLATE.'/pages/about.php';
				break;
			
			default:
				header("HTTP/1.0 404 Not Found");
				include TEMPLATE.'/404.php';
				break;
		}
		
	}

	
}