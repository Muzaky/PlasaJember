<?php
include_once 'config/connection.php';


class M_Pelamaran
{
    static function savePelamaran($data = [])
    {
        global $conn;
        $id_users = $data['id_users'];
        $id_pekerjaan = $data['id_pekerjaan'];
        $alasan = $data['alasan'];

        $stmt = $conn->prepare('INSERT INTO pelamaran (id_users, id_pekerjaan, alasan) VALUES (?, ?, ?)');
        $stmt->bind_param('iis', $id_users, $id_pekerjaan, $alasan);
        $stmt->execute();
        $id = $stmt->insert_id;


        $file_name = $_FILES['dokumen']['name'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_file_name = 'dokumen_pelamaran' . $id . '.' . $file_ext; // Keep the original file extension
        $upload_dir = 'uploads/dokumen_pelamaran/';

        // Check if the upload directory exists, if not, create it
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Set the upload path
        $upload_path = $upload_dir . $new_file_name;

        // Move the uploaded file to the upload directory
        $tmp_name = $_FILES['dokumen']['tmp_name'];
        if (move_uploaded_file($tmp_name, $upload_path)) {
            // File uploaded successfully, update the database
            $stmt = $conn->prepare('UPDATE pelamaran SET dokumen = ? WHERE id = ?');
            $stmt->bind_param('si', $new_file_name, $id);
            $stmt->execute();

            $result = $stmt->affected_rows > 0 ? true : false;
            return $result;
        } else {
            // Failed to upload the file
            return false;
        }
    }

    static function updatePelamaran($data = [])
    {
        global $conn;
        $id = $data['id'];
        $alasan = $data['alasan'];
        $dokumen = isset($data['dokumen']) ? $data['dokumen'] : null;

        if ($dokumen !== null) {
            // If foto is provided, include it in the update query
            $stmt = $conn->prepare('UPDATE pelamaran SET alasan = ?, dokumen = ? WHERE id = ?');
            $stmt->bind_param('ssi', $alasan, $dokumen, $id);
        } else {
            // If foto is not provided, exclude it from the update query
            $stmt = $conn->prepare('UPDATE pelamaran SET alasan = ? WHERE id = ?');
            $stmt->bind_param('si', $alasan, $id);
        }

        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }

    static function deletepelamaran($data = [])
    {
        global $conn;
        $id = $data['id'];
        $sql = 'DELETE FROM pelamaran WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }

    static function getPelaramanbyId($id)
    { 
            global $conn;
            $sql = 'SELECT * FROM pelamaran WHERE id_users = ?';
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
}
