<?php 
include_once 'app/models/M_Credentials.php';
include_once 'app/models/M_Kecamatan.php';
include_once 'app/models/M_Users.php';
include_once 'app/models/M_Perekrut.php';
include_once 'app/models/M_Rating.php';

class C_Rating {

    static function rating(){
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            view('homepage/homepage_layout', [
                'url' => 'rating',
                'user' => $_SESSION['user']
            ]);
        }
    }

    public static function saverating() {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            $pekerja = M_Users::getUsersbyId($_SESSION['user']['id']);
            
            $data = [
                'id_users' => $pekerja['id'],
                'id_perekrut' => $_POST['id_perekrut'],
                'rating' => $_POST['rating'],
                'review' => $_POST['review'],
            ];
            if (M_Rating::saveRating($data)) {
                header('Location: ' . BASEURL . 'homepage/list-perekrut');
                exit;
            } else {
                echo json_encode(['success' => false, 'message' => 'Gagal menyimpan data']);
            }
        }
    }

    
}

?>