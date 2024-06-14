<?php 
include_once 'app/models/M_Credentials.php';
include_once 'app/models/M_Kecamatan.php';
include_once 'app/models/M_Users.php';
include_once 'app/models/M_Perekrut.php';
include_once 'app/models/M_Rating.php';


class C_Admin {
    
    static function dashboard() {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }else{
            $alldata = [];
            $pekerja_list = M_Users::getAllUsers();
            $perekrut_list = M_Perekrut::getAllPerekrut();
            $pekerjaan_list = M_Pekerjaan::getAllPekerjaan();
            $pelamaran_list = M_Pelamaran::getAllPelamaran();
            $rating_list = M_Rating::getAllRating();
            $alldata = [
                'pekerja' => [
                    'list' => $pekerja_list,
                    'count' => count($pekerja_list)
                ],
                'perekrut' => [
                    'list' => $perekrut_list,
                    'count' => count($perekrut_list)
                ],
                'pekerjaan' => [
                    'list' => $pekerjaan_list,
                    'count' => count($pekerjaan_list)
                ],
                'pelamaran' => [
                    'list' => $pelamaran_list,
                    'count' => count($pelamaran_list)
                ],
                'rating' => [
                    'list' => $rating_list,
                    'count' => count($rating_list)
                ]
            ];
            

            $_SESSION['data'] = $alldata;
            $_SESSION['active'] = 'Selamat datang di dashboard admin';
            view('admin/admin_layout', ['url' => 'dashboard', 'user' => $_SESSION['user'], 'data' => $_SESSION['data']]);
        }

    }

   
    static function pekerjadata() {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            $pekerja_list = M_Users::getAllUsers();
            $alldata =[];
            foreach ($pekerja_list as $pekerja){
                $pelamaran = M_Pelamaran::getpelamaranbyid2($pekerja['id']);
                $kecamatan = M_Kecamatan::getKecamatanById($pekerja['kecamatan']);
                $pelamarancount = count($pelamaran);
                $alldata[] = [
                    'pekerja' => $pekerja,
                    'pelamaran' => $pelamaran,
                    'kecamatan' => $kecamatan,
                    'pelamarancount' => $pelamarancount
                ];
                
            }
            
            $_SESSION['pekerja'] = $alldata;
        ;
            view('admin/admin_layout', ['url' => 'pekerjadata', 'user' => $_SESSION['user'], 'pekerja' => $_SESSION['pekerja']]);
        }
    }

    static function pekerjadatadelete(){
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            $id = $_POST['id'];
            M_Credentials::deleteUsers($id);
            header('Location: ' . BASEURL . 'dashboard/pekerja_list');
            exit;
        }
    }

    static function pekerjadataupdate(){
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            $id = $_POST['id'];
            $data = [
                'id' => $_POST['id'],
                'nama' => $_POST['nama'],
                'alamat' => $_POST['alamat'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
            ];
            $_SESSION['status'] = 'Berhasil memperbarui data';
            M_Users::updateUsers($data);
            header('Location: ' . BASEURL . 'dashboard/pekerja_list');
            exit;
        }
    }
    static function perekrutdata() {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            $perekrut_list = M_Perekrut::getAllPerekrut();
            $_SESSION['perekrut'] = $perekrut_list;
            $alldata =[];
            foreach ($perekrut_list as $perekrut){
                $pekerjaan = M_Pekerjaan::getpekerjaanbyid($perekrut['id']);
                $kecamatan = M_Kecamatan::getKecamatanById($perekrut['kecamatan']);
                $pekerjaancount = count($pekerjaan);
                $alldata[] = [
                    'perekrut' => $perekrut,
                    'pekerjaan' => $pekerjaan,
                    'kecamatan' => $kecamatan,
                    'pekerjaancount' => $pekerjaancount
                ];
                $_SESSION['perekrut'] = $alldata;
            }
            
            view('admin/admin_layout', ['url' => 'perekrutdata', 'user' => $_SESSION['user'], 'perekrut' => $_SESSION['perekrut']]);
    
        }
    }

    static function perekrutdatadelete(){
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            $id = $_POST['id'];
            M_Credentials::deleteUsers($id);
            header('Location: ' . BASEURL . 'dashboard/perekrut_list');
            exit;
        }
    }

    static function perekrutdataupdate(){
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            $id = $_POST['id'];
            $data = [
                'id' => $_POST['id'],
                'nama' => $_POST['nama'],
                'alamat' => $_POST['alamat'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'validasi' => $_POST['validasi'],
            ];
            $_SESSION['status'] = 'Berhasil memperbarui data';
            M_Perekrut::updatePerekrut($data);
            header('Location: ' . BASEURL . 'dashboard/perekrut_list');
            exit;
        }
    }
    
    static function pekerjaandata(){
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            $pekerjaan_list = M_Pekerjaan::getAllPekerjaan();
            $_SESSION['pekerjaan'] = $pekerjaan_list;
         
            $alldata =[];
            foreach ($pekerjaan_list as $pekerjaan){
                $lamaran = M_Pelamaran::getpelamaranbyid3($pekerjaan['id']);
                $lamarancount = count($lamaran);
                $alldata[] = [
                    'pekerjaan' => $pekerjaan,
                    'lamaran' => $lamaran,
                    'lamarancount' => $lamarancount
                ];
            }
            $_SESSION['pekerjaan'] = $alldata;
            
            return view('admin/admin_layout', ['url' => 'pekerjaandata', 'user' => $_SESSION['user'], 'pekerjaan' => $_SESSION['pekerjaan']]);
        }
    }   

    static function pekerjaandataupdate(){
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            $id = $_POST['id'];
            $data = [
                'id' => $_POST['id'],
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
                'telp' => $_POST['telp'],
            ];
            $_SESSION['status'] = 'Berhasil memperbarui data';
            M_Pekerjaan::updatePekerjaan($data);
            header('Location: ' . BASEURL . 'dashboard/pekerjaan_list');
            exit;
        }
    }

    static function pekerjaandatadelete(){
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            $id = $_POST['id'];
            M_Pekerjaan::deletePekerjaan($id);
            header('Location: ' . BASEURL . 'dashboard/pekerjaan_list');
            exit;
        }
    }
}

?>