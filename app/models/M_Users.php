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
    static function getUsersbyId2($id){
        {
            global $conn;
            $sql = 'SELECT * FROM users WHERE id = ?';
            $stmt = $conn->prepare( $sql );
            $stmt->bind_param( 'i', $id );
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }
    }

    static function getAllUsers(){
        {
            global $conn;
            $sql = 'SELECT * FROM users';
            $stmt = $conn->prepare( $sql );
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }

    static function deleteUsers($id){
        {
            global $conn;
            $sql = 'DELETE FROM users WHERE id = ?';
            $stmt = $conn->prepare( $sql );
            $stmt->bind_param( 'i', $id );
            $stmt->execute();
        }
    }

    static function updateUsers($data = []){
        global $conn;
        $id = $data['id'];
        $nama = $data['nama'];
        $email = $data['email'];
        $phone = $data['phone'];
        $alamat = $data['alamat'];

        $stmt = $conn->prepare("UPDATE users SET nama = ?, email = ?, phone = ?,alamat = ? WHERE id = ?");
        $stmt->bind_param('ssssi', $nama, $email, $phone, $alamat, $id);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }
}