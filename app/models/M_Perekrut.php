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
        $email = $data['email'];
        $password = $data['password'];


        # Insert to credentials table
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql_cred = "INSERT INTO credentials SET email = ?, password = ?";
        $stmt_cred = $conn->prepare($sql_cred);
        $stmt_cred->bind_param('ss', $email, $hashedPassword);
        $stmt_cred->execute();

        $result_cred = $stmt_cred->affected_rows > 0 ? true : false;



        echo '<script>console.log("' . $result_cred . '")</script>';
        return $result_cred;
    }
}