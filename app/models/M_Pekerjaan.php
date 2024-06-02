<?php 

include_once 'config/connection.php';



class M_Pekerjaan
{
    static function savePekerjaan( $data = [] )
    {
           global $conn;
           $id_perekrut = $data[ 'id_perekrut' ];
           $nama_pekerjaan = $data[ 'nama_pekerjaan' ];
           $deskripsi = $data[ 'deskripsi' ];
           $alamat = $data[ 'alamat' ];
           $status = $data[ 'status' ];
          
           $stmt = $conn->prepare( 'INSERT INTO pekerjaan (id_perekrut, nama_pekerjaan, deskripsi, alamat, status) VALUES (?, ?, ?, ?, ?)' );
           $stmt->bind_param( 'issss', $id_perekrut, $nama_pekerjaan, $deskripsi, $alamat, $status);
           $stmt->execute();
           $id = $stmt->insert_id;
   
           $file_name = $_FILES[ 'foto' ][ 'name' ];
           $file_ext = pathinfo( $file_name, PATHINFO_EXTENSION );
           $new_file_name = 'foto_pekerjaan' . $id . '.webp';
           $upload_dir = 'uploads/foto_pekerjaan/';
   
           if ( !file_exists( $upload_dir ) ) {
               mkdir( $upload_dir, 0777, true );
           }
           $upload_path = $upload_dir . $new_file_name;
   
           $tmp_name = $_FILES[ 'foto' ][ 'tmp_name' ];
           if ( compressToWebP( $tmp_name, $upload_path ) ) {
               $stmt = $conn->prepare( 'UPDATE pekerjaan SET foto = ? WHERE id = ?' );
               $stmt->bind_param( 'si', $new_file_name, $id );
               $stmt->execute();
   
               $result = $stmt->affected_rows > 0 ? true : false;
               return $result;
           } else {
               return false;
           }
       }
}
?>