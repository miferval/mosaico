<?php
/**
 *APP Routes Map
 **/

 /*/////////Routes//////////////*/
 //Home Route
 /*

*/
 $router->add('home', '/')
        ->setValues([
            'controller' => 'home',
            'action'    => 'index',
            'page'        => 'home'
            ]);                        
//Contacto
$router->add('contact', '/contact')
    ->addValues(array(
        'controller' => 'page',
        'site'      => null,
        'action' => 'index',
        'id'    => 'contacto',
        'page'  => 'contacto'
         ));
//about   
$router->add('about', '/about')
    ->addValues(array(
        'controller' => 'page',
        'site'      => null,
        'action' => 'index',
        'page'    => 'nosotros',
        'meta' => 'page',
    ));        
$router->add('posts', '/posts{/seccion}')
    ->addValues(array(
        'controller'=> 'post',
        'action'    => 'index',
        'id'        => null,
        'seccion'   => null,
    ));                
$router->add('leer', '/posts/leer{/id}')
    ->addValues(array(
        'controller' => 'post',
        'action' => 'leer',
        'id' => null
));
$router->add('autor', '/posts/autor{/id}')
    ->addValues(array(
        'controller'    => 'post',
        'action'        => 'autor',
        'id'            => null,
        'seccion'       => 'autor : ',  
));

$router->add('rollbar', '/posts/rollbar/')
    ->addValues(array(
        'controller'    => 'post',
        'action'        => 'rollbar',
        'id'            => null,
        'seccion'       => 'autor : ',  
));    

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$path = str_replace(FOLDER, '', $path);

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
$dispatcher->setObject('home', new ControllerHome($registry,$params));
$dispatcher->setObject('page', new ControllerPage($registry,$params));
$dispatcher->setObject('post', new ControllerPost($registry,$params));
$dispatcher->setObject('notfound', new ControllerNotFound($registry));
