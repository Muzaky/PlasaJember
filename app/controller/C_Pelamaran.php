<?php

include_once 'app/models/M_Pelamaran.php';
include_once 'app/models/M_Pekerjaan.php';



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
}
