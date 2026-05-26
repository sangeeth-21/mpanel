<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->match(['get', 'post'], '/', 'Home::index');
$routes->get('about', 'Home::about');
$routes->match(['get', 'post'], 'support', 'Home::support');
$routes->get('careers', 'Home::careers');
$routes->get('terms', 'Home::terms');
