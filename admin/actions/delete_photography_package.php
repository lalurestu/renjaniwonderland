<?php
include '../../includes/db_connect.php';

header('Content-Type: text/plain');

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = intval($_POST['id']);
    
    // 1. Ambil path gambar dulu
    $sql_select = "SELECT image FROM photography_packages WHERE id = ?";
    $stmt_select = $conn->prepare($sql_select);
    
    if ($stmt_select) {
        $stmt_select->bind_param("i", $id);
        $stmt_select->execute();
        $stmt_select->bind_result($image_path);
        $stmt_select->fetch();
        $stmt_select->close();

        // 2. Hapus file gambar
        if (!empty($image_path) && file_exists($image_path)) {
            unlink($image_path); 
        }

        // 3. Hapus data di database
        $sql = "DELETE FROM photography_packages WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "success";
            } else {
                echo "error: Data tidak ditemukan";
            }
        } else {
            echo "error: Gagal hapus database";
        }
        $stmt->close();
    }
} else {
    echo "error: ID tidak valid";
}
$conn->close();
?>