<?php 

include_once 'config/connection.php';



class M_Kecamatan
{
    static function getAllKec()
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM kecamatan ORDER BY nama ASC");
        $stmt->execute();
        $result = $stmt->get_result();
        $kecamatan = array();
        while ($row = $result->fetch_assoc()) {
            $kecamatan[] = $row;
        }
        return $kecamatan;
        $conn->close();
    }

    static function getKecamatanById($id){
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM kecamatan WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        if ($data === null) {
            return [];
        }
        return $data;
    }
}
?>