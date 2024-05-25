<?php

include_once 'app/models/M_Credentials.php';
include_once 'app/models/M_Kecamatan.php';


class C_Auth
{
    static function login()
    {

        view('auth/auth_layout', ['url' => 'login']);
    }

    static function register()
    {
        view('auth/auth_layout', ['url' => 'register_as']);
    }

    static function registerpekerja()
    {
        $roles_id = 2;
        $kecamatan = M_Kecamatan::getAllKec();
        view('auth/auth_layout', ['url' => 'register', 'roles_id' => $roles_id, 'kecamatan' => $kecamatan]);
    }
    static function registerperekrut()
    {
        $roles_id = 3;
        $kecamatan = M_Kecamatan::getAllKec();
        view('auth/auth_layout', ['url' => 'register', 'roles_id' => $roles_id, 'kecamatan' => $kecamatan]);
    }
}
