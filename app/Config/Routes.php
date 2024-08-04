<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// Ruta para testeo de conexion de bdd
$routes->get('/testdb', 'CBdd::testbdd');
//Ruta de vista
$routes->get('/inv', 'CBdd::Select_Controlador_bdd');
//Ruta de creacion
$routes->post('/crear1','CBdd::Insertar_TblInventario');
//Ruta de user
$routes->get('/usu', 'CBdd::Select_Controlador_Usuario');

$routes->post('/crear2','CBdd::Insertar_TblUsuario');
