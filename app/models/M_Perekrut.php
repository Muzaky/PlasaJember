<?php

include_once 'config/connection.php';


class M_Perekrut{

    static function login($data = [])
    {
        global $conn;
        $email = $data['email'];
        $password = $data['password'];

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

    static function register($data = []){

        global $conn;
        $credentials = $data['id_credentials'];
        $nama = $data['nama'];
        $phone = $data['phone'];
        $email = $data['email'];
        $alamat = $data['alamat'];
        $kecamatan = $data['kecamatan'];
        $validasi = 'process';

        # Insert to credentials table
        $stmt = $conn->prepare("INSERT INTO perekrut SET id_credentials = ?, nama = ?, phone = ?, email = ?, alamat = ?, kecamatan = ?, validasi = ? ");
        $stmt->bind_param('issssis', $credentials, $nama, $phone, $email, $alamat, $kecamatan, $validasi);
        $stmt->execute();
        $users_id = $stmt->insert_id;

        return $users_id;
    }

    static function getAllPerekrut(){
        {
            global $conn;
            $sql = 'SELECT * FROM perekrut';
            $stmt = $conn->prepare( $sql );
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all( MYSQLI_ASSOC );
            $conn->close();
        }
    }

    static function getPerekrutbyid($id){
        {
            global $conn;
            $sql = 'SELECT * FROM perekrut WHERE id_credentials = ?';
            $stmt = $conn->prepare( $sql );
            $stmt->bind_param( 'i', $id );
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }
    }
}