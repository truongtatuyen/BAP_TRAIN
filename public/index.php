<?php

use App\Router;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
require_once '../config/config.php';
require_once '../routes/web.php';
require_once '../app/Router.php';

// Invoke
$router = new Router();

// $routes from routes/web.php
$router($routes);

// Build Sitemap
(new App\Facades\BuildSitemapFacade)->build();
