<?php
use Aura\Router\RouterFactory;
use Aura\Dispatcher\Dispatcher;

$router_factory = new RouterFactory;
$params = array();
$router = $router_factory->newInstance();

// Dispatcher
$dispatcher = new Dispatcher;
// Which parameter specifies the controller
$dispatcher->setObjectParam('controller');
// Which parameter specifies the method
$dispatcher->setMethodParam('action');
