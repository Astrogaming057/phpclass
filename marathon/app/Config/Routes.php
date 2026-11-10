<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home/(:any)', 'Home::home/$1');
$routes->get('/admin/', 'Admin::index');
$routes->match(['get', 'post'], '/login', 'Home::login');
$routes->match(['get', 'post'], '/create', 'Home::create');
