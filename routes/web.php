<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
$routes->add('news_list', new Route(
    constant('URL_SUBFOLDER') . '/',
    ['controller' => 'NewsController', 'method' => 'index'],
    []
));

$routes->add('news_show', new Route(
    constant('URL_SUBFOLDER') . '/news/{id}',
    ['controller' => 'NewsController', 'method' => 'show'],
    ['id' => '[0-9]+']
));
