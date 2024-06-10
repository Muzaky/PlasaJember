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
Router::url('pelamaran/historypelamaran', 'get', 'C_Pelamaran::historypelamaran');





# POST
Router::url('register', 'post', 'C_Auth::saveRegister');
Router::url('login', 'post', 'C_Auth::saveLogin');
Router::url('homepage/createpekerjaan', 'post', 'C_Pekerjaan::createpekerjaan');
Router::url('homepage/updatepekerjaan', 'post', 'C_Pekerjaan::updatepekerjaan');
Router::url('pelamaran/createpelamaran', 'post', 'C_Pelamaran::createpelamaran');
Router::url('pelamaran/updatepelamaran', 'post', 'C_Pelamaran::updatepelamaran');
Router::url('pelamaran/deletepelamaran', 'post', 'C_Pelamaran::deletepelamaran');

#Admin
Router::url('dashboard', 'get', 'C_Admin::dashboard');
Router::url('dashboard/pekerjaan_list', 'get', 'C_Admin::pekerjaandata');
Router::url('dashboard/pekerja_list', 'get', 'C_Admin::pekerjadata');
Router::url('dashboard/perekrut_list', 'get', 'C_Admin::perekrutdata');


#Admin Post
Router::url('dashboard/pekerja_list/delete', 'post', 'C_Admin::pekerjadatadelete');
Router::url('dashboard/pekerja_list/update', 'post', 'C_Admin::pekerjadataupdate');
Router::url('dashboard/perekrut_list/delete', 'post', 'C_Admin::perekrutdatadelete');
Router::url('dashboard/perekrut_list/update', 'post', 'C_Admin::perekrutdataupdate');
Router::url('dashboard/pekerjaan_list/delete', 'post', 'C_Admin::pekerjaandatadelete');
Router::url('dashboard/pekerjaan_list/update', 'post', 'C_Admin::pekerjaandataupdate');