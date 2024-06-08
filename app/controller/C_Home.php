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
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            $perekrut_list = M_Perekrut::getAllPerekrut();
            $alldata = [];
            foreach ($perekrut_list as $perekrut) {
                $pekerjaan_list = M_Pekerjaan::getPekerjaanByid($perekrut['id']);
                $kecamatan = M_Kecamatan::getKecamatanById($perekrut['kecamatan']);
                $pekerjaancount = count($pekerjaan_list);
                $alldata[] = [
                    'perekrut' => $perekrut,
                    'kecamatan' => $kecamatan,
                    'pekerjaan' => $pekerjaan_list,
                    'countpekerjaan' => $pekerjaancount
                ];
            }
            $_SESSION['perekrut'] = $alldata;
           
            view('homepage/homepage_layout', ['url' => 'list-perekrut', 'user' => $_SESSION['user'], 'perekrut' => $_SESSION['perekrut']]);
        }
    }

    static function testingview()
    {
        view('testing/lowongan_cari');
    }
}
