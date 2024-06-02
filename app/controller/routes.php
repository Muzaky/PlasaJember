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




# POST
Router::url('register', 'post', 'C_Auth::saveRegister');
Router::url('login', 'post', 'C_Auth::saveLogin');