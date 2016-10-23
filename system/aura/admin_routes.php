<?php
/**
 *APP Routes Map
 **/

 //Routs
$router->add('home', '/')
		->setValues([
			'controller' => 'dashboard',
			'action'	=> 'index'
			]);

$router->add('dashboard', '/dashboard')
		->setValues([
			'controller' => 'dashboard',
			'action'	=> 'index'
			]);

$router->add('pagina', '/pagina{/action,id}')
    ->addValues(array(
        'controller' => 'pagina',
        'action' => 'index',
        'id' => null, 
    ));
/*/Productos/*/
$router->add('producto', '/producto{/action,id}')
    ->addValues(array(
        'controller' => 'producto',
        'action' => 'index',
        'id' => null, 
    ));
$router->add('usuarios', '/usuarios{/action,id}')
    ->addValues(array(
        'controller' => 'users',
        'action' => 'index',
        'id' => null,
    ));
//News Posts            
$router->add('post', '/post{/action,id}')
    ->addValues(array(
        'controller' => 'post',
        'action' => 'index',
        'id' => null,
));
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$path = str_replace(FOLDER.'/mosaico_admin', '', $path);
//echo $path;
// get the route based on the path and server
$route = $router->match($path, $_SERVER);

//var_dump($route);
if ($route) {
    $params = $route->params;
    $params['post'] = $_POST;
    $params['query'] = $_GET;
    $params['server'] = $_SERVER;
    //$dispatcher($params);
    //var_dump($dispatcher);
    //var_dump($params);
    //print_r($result);
}
else{
	
	$params = ([
			'controller' => 'notfound',
			'action'	=> 'index'
			]);
    
}
$dispatcher->setObject('dashboard', new AdminControllerDashboard($registry,$params));
$dispatcher->setObject('post', new AdminControllerPost($registry,$params));
$dispatcher->setObject('pagina', new AdminControllerPage($registry,$params));
$dispatcher->setObject('producto', new AdminControllerProducto($registry,$params));
$dispatcher->setObject('post', new AdminControllerPost($registry,$params));
$dispatcher->setObject('users', new AdminControllerUser($registry,$params));
$dispatcher->setObject('notfound', new ControllerNotFound($registry));