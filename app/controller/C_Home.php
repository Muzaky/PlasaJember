<?php

include_once 'app/models/M_Perekrut.php';
include_once 'app/models/M_Pekerjaan.php';
include_once 'app/models/M_Pelamaran.php';

class C_Home
{
    static function homepage()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            if ($_SESSION['user']['roles_id'] == 3) {
                $perekrut = M_Perekrut::getPerekrutbyid($_SESSION['user']['id']);
                $_SESSION['perekrut'] = $perekrut;
                $pekerjaan = M_Pekerjaan::getPekerjaanByid($perekrut['id']);
                $_SESSION['pekerjaan'] = $pekerjaan;
          
                view('homepage/homepage_layout', [
                    'url' => 'homepage',
                    'user' => $_SESSION['user'],
                    'perekrut' => $perekrut,
                    'listperekrut' => M_Perekrut::getAllPerekrut(),
                    'pekerjaan' => $pekerjaan
                ]);
            }

            if ($_SESSION['user']['roles_id'] == 2) {
                $pekerja = M_Users::getUsersbyId($_SESSION['user']['id']);
                $_SESSION['pekerja'] = $pekerja;
                $pekerjaan = M_Pekerjaan::getallPekerjaan();
                $_SESSION['pekerjaan'] = $pekerjaan;
                $perekrut = M_Perekrut::getAllPerekrut();
                $_SESSION['perekrut'] = $perekrut;
              


                view('homepage/homepage_layout', [
                    'url' => 'homepage',
                    'user' => $_SESSION['user'],
                    'pekerja' => $pekerja,
                    'pekerjaan' => $pekerjaan,
                    'perekrut' => $perekrut
                ]);
            }
        }
    }

    static function listperekrut()
    {
        view('homepage/homepage_layout', ['url' => 'list-perekrut', 'user' => $_SESSION['user'], 'perekrut' => M_Perekrut::getAllPerekrut()]);
    }

    static function testingview()
    {
        view('testing/lowongan_cari');
    }


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
                'status' => $_POST['status']
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

    static function saveLamaran()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login');
            exit;
        } else {
            $id_credentials = $_SESSION['user']['id'];
            $id_pekerja = M_Users::getUsersbyId($id_credentials);
            $data = [
                'id_users' => $id_pekerja['id'],
                'id_pekerjaan' => $_POST['id_pekerjaan'],
                'deskripsi' => $_POST['deskripsi'],
                'alasan' => $_POST['alasan'],
            ];
            if (M_Pekerjaan::savePekerjaan($data)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Gagal menyimpan data']);
            }
        }
    }
}
