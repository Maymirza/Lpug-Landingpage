<?php

use Config\Services;

// Definisikan rute di sini
$routes->get('/', 'Auth::login');
$routes->get('/admin', 'Admin::dashboard');
$routes->get('/admin/woracle', 'Admin::woracle');
$routes->get('/admin/wsap', 'Admin::wsap');
$routes->get('/admin/wcisco', 'Admin::wcisco');
$routes->get('/admin/boracle', 'Admin::boracle');
$routes->get('/admin/bsap', 'Admin::bsap');
$routes->get('/admin/bcisco', 'Admin::bcisco');
$routes->post('/admin/activeinfo', 'Admin::activeinfo');

$routes->get('/user', 'User::woracle');
$routes->get('/user/wsap', 'User::wsap');
$routes->get('/user/wcisco', 'User::wcisco');
$routes->get('/user/boracle', 'User::boracle');
$routes->get('/user/bsap', 'User::bsap');
$routes->get('/user/bcisco', 'User::bcisco');

