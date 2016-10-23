<?php
/**
* Posts Controller
*/
class ControllerPost extends Controller
{
	
	public function __construct($registry,$router){
		$this->registry = $registry;
		$this->router = $router;
		$this->posts = new ModelPost($this->registry);
	}

	public function index(){
		$posts		= $this->posts->getPostsList($this->router['seccion']);
		$secciones	= $this->posts->getSecciones();
		include TEMPLATE.'/posts/posts.php';

	}


	public function leer(){
		$post	= $this->posts->getPost($this->router['id']);
		$item	= $post->row;
		$secciones	= $this->posts->getSecciones();
		include TEMPLATE.'/posts/post.php';
	}

	public function autor(){
		$posts		= $this->posts->getPostsList('',$this->router['id']);
		$secciones	= $this->posts->getSecciones();
		include TEMPLATE.'/posts/posts.php';
	}

	public function rollbar(){
		// installs global error and exception handlers
		Rollbar::init(array('access_token' => '6def69e6737c4c97ab5cf9d9f10851ca'));

		// Message at level 'info'
		Rollbar::report_message('testing 123', 'info');

		// Catch an exception and send it to Rollbar
		try {
		    throw new Exception('test exception');
		} catch (Exception $e) {
		    Rollbar::report_exception($e);
		}

		// Will also be reported by the exception handler
		throw new Exception('test 2');
	}
}