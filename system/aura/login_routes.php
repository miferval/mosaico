<?php
/**
 *APP Routes Map
 **/

 /*/////////Routs//////////////*/
 //Home Route

$router->add('login', '/')
        ->setValues([
            'controller' => 'login',
            'action'    => 'login',
            'id'        => null,
            ]);

$router->add('register', '/registro')
    ->addValues(array(
        'controller' => 'login',
        'site'      => null,
        'action' => 'registro',
        'id'    => null,
    ));

$router->add('forgot', '/olvidaste')
    ->addValues(array(
        'controller' => 'login',
        'site'      => null,
        'action' => 'forgot',
        'id'    => null,
    ));    
//Route for static pages
$router->add('page', '{/id}')
    ->addValues(array(
        'controller' => 'login',
        'action' => 'login',
        'id' => null,
    ));

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$path = str_replace(FOLDER.'/mosaico_admin', '', $path);
//echo $path;//DEBUG

//Get the route based on the path and server
$route = $router->match($path, $_SERVER);


//var_dump($route);//DEBUG
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
        'action'    => 'index'
        ]);   
}

//Initialize Dispatcher Classes
$dispatcher->setObject('login', new ControllerLogin($registry,$params));
$dispatcher->setObject('notfound', new ControllerNotFound($registry));
