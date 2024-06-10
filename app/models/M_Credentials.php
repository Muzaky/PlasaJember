<?php

include_once 'config/connection.php';

class M_Credentials{

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
        global $conn;

        $email = $data['email'];
        $password = $data['password'];
        $roles_id = $data['roles_id'];

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert into credentials table
        $sql_cred = "INSERT INTO credentials (email, password, roles_id) VALUES (?, ?, ?)";
        $stmt_cred = $conn->prepare($sql_cred);
        $stmt_cred->bind_param('ssi', $email, $hashedPassword, $roles_id);
        $stmt_cred->execute();

        // Check if the insert was successful
        if ($stmt_cred->affected_rows > 0) {
            // Get the ID of the inserted record
            $inserted_id = $stmt_cred->insert_id;

            // Close the statement
            $stmt_cred->close();

            // Return the inserted ID
            return $inserted_id;
        } else {
            // Handle error
            $stmt_cred->close();
            return null;
        }
    }

    static function deleteUsers($id){
        {
            global $conn;
            $sql = 'DELETE FROM credentials WHERE id = ?';
            $stmt = $conn->prepare( $sql );
            $stmt->bind_param( 'i', $id );
            $stmt->execute();
        }
    }

}