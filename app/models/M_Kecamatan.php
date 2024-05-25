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
}
?>