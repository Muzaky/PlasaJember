<?php
include_once 'config/static.php';
include_once 'main.php';
include_once 'function/main.php';


# GET
Router::url('/', 'get', function () {
    view('main/landing_layout', ['url' => 'landing']);
});

Router::url('login', 'get', 'C_Auth::login');
Router::url('register', 'get', 'C_Auth::register');
Router::url('homepage', 'get', 'C_Home::homepage');
Router::url('register/pekerja', 'get', 'C_Auth::registerpekerja');
Router::url('register/perekrut', 'get', 'C_Auth::registerperekrut');
Router::url('homepage/list-perekrut', 'get', 'C_Home::listperekrut');
router::url('lowongan_cari', 'get', 'C_Home::testingview'); 
Router::url('logout','get','C_Auth::logout');
Router::url('pelamaran/formlamaran', 'get', 'C_Pelamaran::formLamaran');




# POST
Router::url('register', 'post', 'C_Auth::saveRegister');
Router::url('login', 'post', 'C_Auth::saveLogin');
Router::url('homepage/createpekerjaan', 'post', 'C_Home::createpekerjaan');
Router::url('homepage/updatepekerjaan', 'post', 'C_Home::updatepekerjaan');