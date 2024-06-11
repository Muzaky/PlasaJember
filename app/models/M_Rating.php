<?php
include_once 'config/connection.php';

class M_Rating{

    static function getAllRating(){
        global $conn;
        $sql = 'SELECT * FROM rating';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    static function saveRating($data = []){

        global $conn;
        
        $stmt = $conn->prepare('INSERT INTO rating (id_users, id_perekrut, rating, review) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('iiis', $data['id_users'], $data['id_perekrut'], $data['rating'], $data['review']);
        $stmt->execute();

        
        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;

    }

    static function getRatingByid($id){
        global $conn;
        $stmt = $conn->prepare('SELECT * FROM rating WHERE id_perekrut = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

}



?>