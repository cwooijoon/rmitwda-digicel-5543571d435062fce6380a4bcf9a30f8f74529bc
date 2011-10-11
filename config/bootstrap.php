<?php

define('LIBRARY_PATH', APP_PATH . DS . 'libraries');

//test out routes

$routes = array();
$routes['#^/$#i'] = array('controller' => 'home', 'action' => 'index');
$routes['#^/home$#i'] = array('controller' => 'home', 'action' => 'index');
$routes['#^/home/index$#i'] = array('controller' => 'home', 'action' => 'index');

$routes['#^/users$#i'] = array('controller' => 'users', 'action' => 'index');
$routes['#^/users/new$#i'] = array('controller' => 'users', 'action' => 'add');
$routes['#^/users/create$#i'] = array('controller' => 'users', 'action' => 'create');
$routes['#^/users/([0-9]{1,5})$#i'] = array('controller' => 'users', 'action' => 'show');
$routes['#^/users/([0-9]{1,5})/edit$#i'] = array('controller' => 'users', 'action' => 'edit');
$routes['#^/users/([0-9]{1,5})/update$#i'] = array('controller' => 'users', 'action' => 'update');

$routes['#^/session/new$#i'] = array('controller' => 'session', 'action' => 'add');
$routes['#^/session/create$#i'] = array('controller' => 'session', 'action' => 'create');
$routes['#^/session/destroy$#i'] = array('controller' => 'session', 'action' => 'destroy');

$routes['#^/distributor$#i'] = array('controller' => 'distributor', 'action' => 'index');
$routes['#^/distributor/new$#i'] = array('controller' => 'distributor', 'action' => 'add');
$routes['#^/distributor/create$#i'] = array('controller' => 'distributor', 'action' => 'create');
$routes['#^/distributor/([0-9]{1,5})$#i'] = array('controller' => 'distributor', 'action' => 'show');
$routes['#^/distributor/([0-9]{1,5})/edit$#i'] = array('controller' => 'distributor', 'action' => 'edit');
$routes['#^/distributor/([0-9]{1,5})/update$#i'] = array('controller' => 'distributor', 'action' => 'update');

$routes['#^/brands$#i'] = array('controller' => 'brands', 'action' => 'index');
$routes['#^/brands/new$#i'] = array('controller' => 'brands', 'action' => 'add');
$routes['#^/brands/create$#i'] = array('controller' => 'brands', 'action' => 'create');
$routes['#^/brands/([0-9]{1,5})$#i'] = array('controller' => 'brands', 'action' => 'show');
$routes['#^/brands/([0-9]{1,5})/edit$#i'] = array('controller' => 'brands', 'action' => 'edit');
$routes['#^/brands/([0-9]{1,5})/update$#i'] = array('controller' => 'brands', 'action' => 'update');

$routes['#^/categories$#i'] = array('controller' => 'categories', 'action' => 'index');
$routes['#^/categories/new$#i'] = array('controller' => 'categories', 'action' => 'add');
$routes['#^/categories/create$#i'] = array('controller' => 'categories', 'action' => 'create');
$routes['#^/categories/([0-9]{1,5})$#i'] = array('controller' => 'categories', 'action' => 'show');
$routes['#^/categories/([0-9]{1,5})/edit$#i'] = array('controller' => 'categories', 'action' => 'edit');
$routes['#^/categories/([0-9]{1,5})/update$#i'] = array('controller' => 'categories', 'action' => 'update');

$routes['#^/products$#i'] = array('controller' => 'products', 'action' => 'index');

$routes['#^/products/processors$#i'] = array('controller' => 'processors', 'action' => 'index');
$routes['#^/products/processors/new$#i'] = array('controller' => 'processors', 'action' => 'add');
$routes['#^/products/processors/create$#i'] = array('controller' => 'processors', 'action' => 'create');
$routes['#^/products/processors/([0-9]{1,5})$#i'] = array('controller' => 'processors', 'action' => 'show');
$routes['#^/products/processors/([0-9]{1,5})/edit$#i'] = array('controller' => 'processors', 'action' => 'edit');
$routes['#^/products/processors/([0-9]{1,5})/update$#i'] = array('controller' => 'processors', 'action' => 'update');

$routes['#^/products/motherboards$#i'] = array('controller' => 'motherboards', 'action' => 'index');
$routes['#^/products/motherboards/new$#i'] = array('controller' => 'motherboards', 'action' => 'add');
$routes['#^/products/motherboards/create$#i'] = array('controller' => 'motherboards', 'action' => 'create');
$routes['#^/products/motherboards/([0-9]{1,5})$#i'] = array('controller' => 'motherboards', 'action' => 'show');
$routes['#^/products/motherboards/([0-9]{1,5})/edit$#i'] = array('controller' => 'motherboards', 'action' => 'edit');
$routes['#^/products/motherboards/([0-9]{1,5})/update$#i'] = array('controller' => 'motherboards', 'action' => 'update');

$routes['#^/products/rams$#i'] = array('controller' => 'rams', 'action' => 'index');
$routes['#^/products/rams/new$#i'] = array('controller' => 'rams', 'action' => 'add');
$routes['#^/products/rams/create$#i'] = array('controller' => 'rams', 'action' => 'create');
$routes['#^/products/rams/([0-9]{1,5})$#i'] = array('controller' => 'rams', 'action' => 'show');
$routes['#^/products/rams/([0-9]{1,5})/edit$#i'] = array('controller' => 'rams', 'action' => 'edit');
$routes['#^/products/rams/([0-9]{1,5})/update$#i'] = array('controller' => 'rams', 'action' => 'update');

$routes['#^/products/harddisks$#i'] = array('controller' => 'harddisk', 'action' => 'index');
$routes['#^/products/harddisks/new$#i'] = array('controller' => 'harddisk', 'action' => 'add');
$routes['#^/products/harddisks/create$#i'] = array('controller' => 'harddisk', 'action' => 'create');
$routes['#^/products/harddisks/([0-9]{1,5})$#i'] = array('controller' => 'harddisk', 'action' => 'show');
$routes['#^/products/harddisks/([0-9]{1,5})/edit$#i'] = array('controller' => 'harddisk', 'action' => 'edit');
$routes['#^/products/harddisks/([0-9]{1,5})/update$#i'] = array('controller' => 'harddisk', 'action' => 'update');

$routes['#^/products/optical_roms$#i'] = array('controller' => 'optical_roms', 'action' => 'index');
$routes['#^/products/optical_roms/new$#i'] = array('controller' => 'optical_roms', 'action' => 'add');
$routes['#^/products/optical_roms/create$#i'] = array('controller' => 'optical_roms', 'action' => 'create');
$routes['#^/products/optical_roms/([0-9]{1,5})$#i'] = array('controller' => 'optical_roms', 'action' => 'show');
$routes['#^/products/optical_roms/([0-9]{1,5})/edit$#i'] = array('controller' => 'optical_roms', 'action' => 'edit');
$routes['#^/products/optical_roms/([0-9]{1,5})/update$#i'] = array('controller' => 'optical_roms', 'action' => 'update');

$routes['#^/products/graphics$#i'] = array('controller' => 'graphics', 'action' => 'index');
$routes['#^/products/graphics/new$#i'] = array('controller' => 'graphics', 'action' => 'add');
$routes['#^/products/graphics/create$#i'] = array('controller' => 'graphics', 'action' => 'create');
$routes['#^/products/graphics/([0-9]{1,5})$#i'] = array('controller' => 'graphics', 'action' => 'show');
$routes['#^/products/graphics/([0-9]{1,5})/edit$#i'] = array('controller' => 'graphics', 'action' => 'edit');
$routes['#^/products/graphics/([0-9]{1,5})/update$#i'] = array('controller' => 'graphics', 'action' => 'update');

$routes['#^/products/monitors$#i'] = array('controller' => 'monitors', 'action' => 'index');
$routes['#^/products/monitors/new$#i'] = array('controller' => 'monitors', 'action' => 'add');
$routes['#^/products/monitors/create$#i'] = array('controller' => 'monitors', 'action' => 'create');
$routes['#^/products/monitors/([0-9]{1,5})$#i'] = array('controller' => 'monitors', 'action' => 'show');
$routes['#^/products/monitors/([0-9]{1,5})/edit$#i'] = array('controller' => 'monitors', 'action' => 'edit');
$routes['#^/products/monitors/([0-9]{1,5})/update$#i'] = array('controller' => 'monitors', 'action' => 'update');
