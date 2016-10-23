<?php

class ControllerHome extends Controller
{
	public function __construct($registry,$router){
		$this->registry = $registry;
		$this->router = $router;
		$this->posts = new ModelPost($this->registry);
	}

	function index(){
		
		//$posts		= $this->posts->getPostsList();
		//$item		= $posts->row;
		//$secciones	= $this->posts->getSecciones();
		include TEMPLATE.'/home/home.php';	
	}

}
