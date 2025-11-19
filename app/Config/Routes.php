<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->resource('camiones');
$routes->resource('choferes');
$routes->resource('estaciones');
$routes->resource('historialpago');
$routes->resource('rutaestaciones');
$routes->resource('rutas');
$routes->resource('tarifas');
$routes->resource('ubicacionescamiones');
$routes->resource('usuario');
$routes->resource('viajes');