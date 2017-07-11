<?php
use Cake\Core\Plugin;
use Cake\Routing\Router;
Router::defaultRouteClass('Route');

Router::scope('/', function ($routes) {
    $routes->connect('/', ['controller' => 'Mains']);
    $routes->extensions(['json']);
    $routes->fallbacks('InflectedRoute');
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
