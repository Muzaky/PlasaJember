<?php

include_once 'app/models/M_Perekrut.php';
include_once 'app/models/M_Pekerjaan.php';
include_once 'app/models/M_Pelamaran.php';



class C_Pelamaran
{
    static function formLamaran()
    {
        $id = $_GET['id'];

        // Fetch details for the job using the id
        $pekerjaandetails = M_Pekerjaan::getPekerjaanByidpekerjaan($id);

        $pekerja = M_Users::getUsersbyId($_SESSION['user']['id']);
        if (!$pekerjaandetails) {
            // Handle the case where the job is not found
            echo "Job not found.";
            return;
        }

        // Render the form view with job details
        view('pelamaran/pelamaran_layout', [
            'url' => 'daftarpekerjaan',
            'pekerjaandetails' => $pekerjaandetails,
            'user' => $_SESSION['user'],
            'pekerja' => $pekerja
        ]);
    }

    static function createpelamaran()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login');
            exit;
        } else {
            $pekerja = M_Users::getUsersbyId($_SESSION['user']['id']);
            $data = [
                'id_users' => $pekerja['id'],
                'id_pekerjaan' => $_POST['id_pekerjaan'],
                'alasan' => $_POST['alasan'],
            ];
            if (M_Pelamaran::savePelamaran($data)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Gagal menyimpan data']);
            }
        }
    }

    static function updatepelamaran()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {

            $data = [
                
                'id' => $_POST['id'],
                'alasan' => $_POST['alasan'],
            ];
        
            if (M_Pelamaran::updatePelamaran($data)) {
                header('Location: ' . BASEURL . 'homepage');
            } else {
                echo json_encode(['success' => false, 'message' => 'Gagal menyimpan data']);
            }
        }
    }

    static function deletepelamaran()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            $data = [
                'id' => $_POST['id']
            ];
      
            if (M_Pelamaran::deletePelamaran($data)) {
                header('Location: ' . BASEURL . 'homepage');
            } else {
                echo json_encode(['success' => false, 'message' => 'Gagal menghapus data']);
            }
        }
    }

    static function historypelamaran()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login');
            exit;
        } else {
            $pekerja = M_Users::getUsersbyId($_SESSION['user']['id']);
            $pelamaran = M_Pelamaran::getPelaramanbyId($pekerja['id']);
            
            view('pelamaran/pelamaran_layout', [
                'url' => 'historypelamaran',
                'pelamaran' => $pelamaran,
                'user' => $_SESSION['user'],
                'pekerja' => $pekerja
            ]);
        }
    }
}
