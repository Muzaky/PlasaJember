<?php

include_once 'app/models/M_Credentials.php';
include_once 'app/models/M_Kecamatan.php';
include_once 'app/models/M_Users.php';


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

    static function saveRegister()
    {
        $post = array_map('htmlspecialchars', $_POST);
        echo "test";
        $credentials = M_Credentials::register([
            'email' => $post['email'],
            'password' => $post['password'],
            'roles_id' => $post['roles_id'],
        ]);

        if ($post['roles_id'] === '2') {
            $data = M_Users::register([
                'id_credentials' => $credentials,
                'nama' => $post['nama'],
                'phone' => $post['phone'],
                'email' => $post['email'],
                'umur' => $post['umur'],
                'gender' => $post['gender'],
                'alamat' => $post['alamat'],
                'kecamatan' => $post['kecamatan'],
            ]);
        } elseif ($post['roles_id'] === '3') {
            $data = M_Perekrut::register([
                'users_id' => $credentials,
                'nama' => $post['nama'],
                'phone' => $post['phone'],
                'email' => $post['email'],
                'alamat' => $post['alamat'],
            ]);
        }
    }  

    static function saveLogin(){
        $post = array_map('htmlspecialchars', $_POST);

        $users = M_Credentials::login([
            'email' => $post['email'],
            'password' => $post['password']
        ]);

        // echo '<script>console.log(' . json_encode($user) . ')</script>';

        if ($users) {
            unset($users['password']);
            $_SESSION['user'] = $users;

            // echo '<script>console.log(' . json_encode($_SESSION['user']) . ')</script>';

            header('Location: ' . BASEURL . 'homepage');
        } else {
            header('Location: ' . BASEURL . 'login?failed=true');
        }
    }
}
