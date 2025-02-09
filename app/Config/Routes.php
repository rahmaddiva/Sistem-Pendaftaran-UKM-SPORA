<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'BerandaController::index');
$routes->get('login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/auth/register', 'AuthController::registrasi');
$routes->post('/auth/proses_registrasi', 'AuthController::proses_registrasi');
$routes->post('/auth/login', 'AuthController::loginProses');
$routes->get('/auth/activate/(:hash)', 'AuthController::activate/$1');
$routes->get('/auth/aktifasi_berhasil', 'AuthController::aktifasi_berhasil');
$routes->get('/auth/aktifasi_gagal', 'AuthController::aktifasi_gagal');
$routes->get('/dashboard', 'DashboardController::index');

// Routes Kelola User
$routes->get('/kelola_user', 'AuthController::index');
$routes->post('/proses_user', 'AuthController::proses_user');
$routes->post('/update_user/(:num)', 'AuthController::update_user/$1');
$routes->get('/hapus_user/(:num)', 'AuthController::hapus_user/$1');

// Routes Kelola Pendaftaran \
$routes->get('/kelola_pendaftaran', 'PendaftaranController::index');
$routes->post('kelola_pendaftaran/update/', 'PendaftaranController::pendaftaran_update');


// Routes Pendaftar
$routes->get('/pendaftar_masuk', 'PendaftarController::pendaftar_masuk');
$routes->get('/pendaftar_detail/(:num)', 'PendaftarController::pendaftar_detail/$1');
$routes->get('/pendaftar_diterima', 'PendaftarController::pendaftar_diterima');
$routes->post('/pendaftar_terima', 'PendaftarController::pendaftar_terima');
$routes->get('/pendaftar_ditolak', 'PendaftarController::pendaftar_ditolak');
$routes->post('/pendaftar_tolak', 'PendaftarController::pendaftar_tolak');

// Routes Pendaftar Divisi
$routes->get('/pendaftar_voli', 'PendaftarController::pendaftar_voli');
$routes->get('/pendaftar_sepakbola', 'PendaftarController::pendaftar_sepakbola');
$routes->get('/pendaftar_futsal', 'PendaftarController::pendaftar_futsal');
$routes->get('/pendaftar_esport', 'PendaftarController::pendaftar_esport');
$routes->get('/pendaftar_kempo', 'PendaftarController::pendaftar_kempo');
$routes->get('/pendaftar_badminton', 'PendaftarController::pendaftar_badminton');
$routes->get('/pendaftar_basket', 'PendaftarController::pendaftar_basket');

// Routes Kelola Divisi
$routes->get('/kelola_divisi', 'DivisiController::index');
$routes->post('/proses_divisi', 'DivisiController::proses_divisi');
$routes->post('update_divisi/(:num)', 'DivisiController::update_divisi/$1');
$routes->get('/hapus_divisi/(:num)', 'DivisiController::hapus_divisi/$1');

// Routes Kelola Prodi 
$routes->get('/kelola_prodi', 'ProdiController::index');
$routes->post('/proses_prodi', 'ProdiController::proses_prodi');
$routes->post('/update_prodi/(:num)', 'ProdiController::update_prodi/$1');
$routes->get('/hapus_prodi/(:num)', 'ProdiController::hapus_prodi/$1');

// Routes Kelola Tipe User

$routes->get('/kelola_tipe_user', 'TipeuserController::index');
$routes->post('/proses_tipe_user', 'TipeuserController::proses_tipe_user');
$routes->post('/update_tipe_user', 'TipeuserController::update_tipe_user');
$routes->get('/hapus_tipe_user/(:num)', 'TipeuserController::delete_tipe_user/$1');



?>
