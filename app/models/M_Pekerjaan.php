<?php

include_once 'config/connection.php';



class M_Pekerjaan
{
    static function savePekerjaan($data = [])
    {

        global $conn;
        $id_perekrut = $data['id_perekrut'];
        $nama_pekerjaan = $data['nama_pekerjaan'];
        $deskripsi = $data['deskripsi'];
        $alamat = $data['alamat'];
        $status = $data['status'];
        $tugas = $data['tugas'];
        $waktu_kerja = $data['waktu_kerja'];
        $waktu_selesai = $data['waktu_selesai'];
        $kompensasi = $data['kompensasi'];
        $per = $data['per'];
        $batas = $data['batas'];
        $email = $data['email'];
        $telp = $data['telp'];

        $stmt = $conn->prepare('INSERT INTO pekerjaan (id_perekrut, nama_pekerjaan, deskripsi, alamat, tugas, waktu_kerja, waktu_selesai , kompensasi, per , batas, email, telp, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('issssssisssss', $id_perekrut, $nama_pekerjaan, $deskripsi, $alamat, $tugas, $waktu_kerja, $waktu_selesai, $kompensasi, $per, $batas, $email, $telp, $status);
        $stmt->execute();
        $id = $stmt->insert_id;

        $file_name = $_FILES['foto']['name'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_file_name = 'foto_pekerjaan' . $id . '.webp';
        $upload_dir = 'uploads/foto_pekerjaan/';

        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $upload_path = $upload_dir . $new_file_name;

        $tmp_name = $_FILES['foto']['tmp_name'];
        if (compressToWebP($tmp_name, $upload_path)) {
            $stmt = $conn->prepare('UPDATE pekerjaan SET foto = ? WHERE id = ?');
            $stmt->bind_param('si', $new_file_name, $id);
            $stmt->execute();

            $result = $stmt->affected_rows > 0 ? true : false;
            return $result;
        } else {
            return false;
        }
    }

    static function updatePekerjaan($data = [])
    {
        global $conn;
        $id = $data['id'];
        $nama_pekerjaan = $data['nama_pekerjaan'];
        $deskripsi = $data['deskripsi'];
        $alamat = $data['alamat'];
        $status = $data['status'];
        $tugas = $data['tugas'];
        $waktu_kerja = $data['waktu_kerja'];
        $waktu_selesai = $data['waktu_selesai'];
        $kompensasi = $data['kompensasi'];
        $per = $data['per'];
        $batas = $data['batas'];
        $email = $data['email'];
        $telp = $data['telp'];
        $foto = isset($data['foto']) ? $data['foto'] : null;

        if ($foto !== null) {
            // If foto is provided, include it in the update query
            $stmt = $conn->prepare('UPDATE pekerjaan SET nama_pekerjaan = ?, deskripsi = ?, alamat = ?, status = ?, foto = ?, tugas = ?, waktu_kerja = ?,waktu_selesai = ?, kompensasi = ?,per = ?, batas = ?, email = ?, telp = ? WHERE id = ?');
            $stmt->bind_param('sssssssssssssi', $nama_pekerjaan, $deskripsi, $alamat, $status, $foto, $tugas, $waktu_kerja, $waktu_selesai, $kompensasi, $per, $batas, $email, $telp, $id);
        } else {
            // If foto is not provided, exclude it from the update query
            $stmt = $conn->prepare('UPDATE pekerjaan SET nama_pekerjaan = ?, deskripsi = ?, alamat = ?, status = ?, tugas = ?, waktu_kerja = ?,waktu_selesai = ?, kompensasi = ?,per = ?, batas = ?, email = ?, telp = ? WHERE id = ?');
            $stmt->bind_param('ssssssssssssi', $nama_pekerjaan, $deskripsi, $alamat, $status, $tugas, $waktu_kerja, $waktu_selesai, $kompensasi, $per, $batas, $email, $telp, $id);
        }
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }
    static function getPekerjaanByid($id)
    {
        global $conn;
        $sql = 'SELECT * FROM pekerjaan WHERE id_perekrut = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        if ($data === null) {
            return [];
        }
        return $data;
    }

    static function getallPekerjaan()
    {
        global $conn;
        $sql = 'SELECT * FROM pekerjaan';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        if ($data === null) {
            return [];
        }
        return $data;
    }

    static function getPekerjaanByidpekerjaan($id)
    {
        global $conn;
        $sql = 'SELECT * FROM pekerjaan WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        if ($data === null) {
            return [];
        }
        return $data;
    }
    static function deletePekerjaan($id)
    {
        global $conn;
        $sql = 'DELETE FROM pekerjaan WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}
