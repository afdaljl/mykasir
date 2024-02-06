<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//Routes Produk
$routes->get('/produk', 'ProdukController::index');
$routes->get('/produk/getAllProduk', 'ProdukController::getAllProduk');
$routes->post('/produk/addProduk', 'ProdukController::addProduk');
$routes->post('/produk/updateProduk', 'ProdukController::updateProduk');
$routes->post('/produk/hapusProduk', 'ProdukController::hapusProduk');
$routes->get('/produk/getProdukById', 'ProdukController::getById');
$routes->get('/produk/updateProduk', 'ProdukController::getById');
//Routes Detail Penjualan
$routes->get('/detail', 'DetailPenjualan::index');
//Routes Pelanggan
$routes->get('/pelanggan', 'Pelanggan::index');
$routes->get('/pelanggan/getAllPelanggan', 'Pelanggan::getAllPelanggan');
$routes->post('/pelanggan/addPelanggan', 'Pelanggan::addPelanggan');
$routes->post('/pelanggan/updatePelanggan', 'Pelanggan::updatePelanggan');
$routes->post('/pelanggan/hapusPelanggan', 'Pelanggan::hapusPelanggan');
$routes->get('/pelanggan/getPelangganById', 'Pelanggan::getById');
$routes->get('/pelanggan/updatePelanggan', 'Pelanggan::getById');