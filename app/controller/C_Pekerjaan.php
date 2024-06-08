<?php 
include_once 'app/models/M_Perekrut.php';
include_once 'app/models/M_Pekerjaan.php';
include_once 'app/models/M_Pelamaran.php';

class C_Pekerjaan {
    static function createpekerjaan()
    {
        
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login');
            exit;
        } else {
            $id_credentials = $_SESSION['user']['id'];
            $id_perekrut = M_Perekrut::getPerekrutbyid($id_credentials);
            $data = [
                'id_perekrut' => $id_perekrut['id'],
                'nama_pekerjaan' => $_POST['nama_pekerjaan'],
                'deskripsi' => $_POST['deskripsi'],
                'alamat' => $_POST['alamat'],
                'status' => $_POST['status'],
                'tugas' => $_POST['tugas'],
                'waktu_kerja' => $_POST['waktu_kerja'],
                'waktu_selesai' => $_POST['waktu_selesai'],
                'kompensasi' => $_POST['kompensasi'],
                'per' => $_POST['per'],
                'batas' => $_POST['batas'],
                'email' => $_POST['email'],
                'telp' => $_POST['telp']

            ];
            if (M_Pekerjaan::savePekerjaan($data)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Gagal menyimpan data']);
            }
        }
    }

    static function updatepekerjaan()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {

            $data = [
                'id' => $_POST['id'],
                'nama_pekerjaan' => $_POST['nama_pekerjaan'],
                'deskripsi' => $_POST['deskripsi'],
                'alamat' => $_POST['alamat'],
                'status' => $_POST['status']
            ];
            if (M_Pekerjaan::updatePekerjaan($data)) {
                header('Location: ' . BASEURL . 'homepage');
            } else {
                echo json_encode(['success' => false, 'message' => 'Gagal menyimpan data']);
            }
        }
    }
}
?>