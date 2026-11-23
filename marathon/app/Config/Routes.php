<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home/(:any)', 'Home::home/$1');




$routes->get('admin', 'Admin::index');
$routes->get('admin/', 'Admin::index');
$routes->get('/marathon', 'Admin::manage_marathon');
$routes->get('/add', 'Admin::add_marathon');
$routes->get('/runners', 'Admin::manage_runners');
$routes->get('/registration', 'Admin::registration_fourm');



$routes->match(['get', 'post'], '/login', 'Home::login');
$routes->match(['get', 'post'], '/create', 'Home::create');


$routes->post('/add_race', 'Admin::add_race');
