<?php

include_once 'app/models/M_Credentials.php';
include_once 'app/models/M_Kecamatan.php';
include_once 'app/models/M_Users.php';
include_once 'app/models/M_Perekrut.php';


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

            if ($data) {
                header('Location: ' . BASEURL . 'login');
            }
        } elseif ($post['roles_id'] === '3') {
            $data = M_Perekrut::register([
                'id_credentials' => $credentials,
                'nama' => $post['nama'],
                'phone' => $post['phone'],
                'email' => $post['email'],
                'alamat' => $post['alamat'],
                'kecamatan' => $post['kecamatan'],
            ]);
            
            if ($data) {
                header('Location: ' . BASEURL . 'login');
            }
        }
    }  

    static function saveLogin(){
        $post = array_map('htmlspecialchars', $_POST);

        $users = M_Credentials::login([
            'email' => $post['email'],
            'password' => $post['password']
        ]);

        

        if ($users) {
            unset($users['password']);
            session_regenerate_id(true);
            $_SESSION['user'] = $users;
            if ($users['roles_id'] == 1) {
                $_SESSION['active'] = true;
                header('Location: ' . BASEURL . 'dashboard');
            } else {
                $_SESSION['active'] = true;
                header('Location: ' . BASEURL . 'homepage');
            }
        } else {
            header('Location: ' . BASEURL . 'login?failed=true');
        }
    }

    

    static function logout()
    {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        session_destroy();
        header('Location: ' . BASEURL);
        exit();
    }
}
