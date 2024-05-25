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
Router::url('register/pekerja', 'get', 'C_Auth::registerpekerja');
Router::url('register/perekrut', 'get', 'C_Auth::registerperekrut');