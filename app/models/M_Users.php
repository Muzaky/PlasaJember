<?php

include_once 'config/connection.php';

class M_Users{

    static function login($data = [])
    {
        $email = $data['email'];
        $password = $data['password'];
        global $conn;

        $result = $conn->query("SELECT * FROM credentials WHERE email = '$email'");
        if ($result = $result->fetch_assoc()) {
            $hashedPassword = $result['password'];
            $verify = password_verify($password, $hashedPassword);
            if ($verify) {
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    static function register($data = [])
    {

        $credentials = $data['id_credentials'];
        $nama = $data['nama'];
        $phone = $data['phone'];
        $email = $data['email'];
        $umur = $data['umur'];
        $gender = $data['gender'];
        $alamat = $data['alamat'];
        $kecamatan = $data['kecamatan'];
              
        global $conn;
        $stmt = $conn->prepare("INSERT INTO users SET id_credentials = ?, nama = ?, phone = ?, email = ?, umur = ?, gender = ?, alamat = ?, kecamatan = ?");
        $stmt->bind_param('isssissi', $credentials, $nama, $phone, $email, $umur, $gender, $alamat, $kecamatan);
        $stmt->execute();
        $users_id = $stmt->insert_id;

        return $users_id;
    }

    static function getUsersbyId($id){
        {
            global $conn;
            $sql = 'SELECT * FROM users WHERE id_credentials = ?';
            $stmt = $conn->prepare( $sql );
            $stmt->bind_param( 'i', $id );
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }
    }
}