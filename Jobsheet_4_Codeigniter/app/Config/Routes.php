<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('siswa', 'Siswa::index');
$routes->get('siswa/tambah', 'Siswa::tambah');
$routes->post('siswa/simpan', 'Siswa::simpan');
$routes->get('siswa/edit/(:num)', 'Siswa::edit/$1');
$routes->post('siswa/update/(:num)', 'Siswa::update/$1');
$routes->get('siswa/hapus/(:num)', 'Siswa::hapus/$1');
$routes->get('siswa/cari', 'Siswa::cari');