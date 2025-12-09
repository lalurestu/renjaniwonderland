<?php
include '../../includes/db_connect.php';

header('Content-Type: application/json');

$response = ['status' => 'error', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $category = $_POST['category'] ?? '';
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? '';

    if (empty($id) || empty($category) || empty($title) || empty($description) || empty($price)) {
        $response['message'] = 'Semua field wajib diisi.';
        echo json_encode($response);
        exit;
    }

    // Cek apakah ada gambar baru
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../assets/images/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
        
        $fileName = time() . '_' . basename($_FILES['image']['name']);
        $filePath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
            $image = 'assets/images/' . $fileName;
            // UPDATE DENGAN GAMBAR (Kolom dihapus dari query)
            $sql = "UPDATE photography_packages SET category=?, title=?, description=?, price=?, image=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssi", $category, $title, $description, $price, $image, $id);
        } else {
            echo json_encode(['status'=>'error', 'message'=>'Gagal upload gambar']); exit;
        }
    } else {
        // UPDATE TANPA GAMBAR (Kolom dihapus dari query)
        $sql = "UPDATE photography_packages SET category=?, title=?, description=?, price=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $category, $title, $description, $price, $id);
    }

    if ($stmt && $stmt->execute()) {
        $response['status'] = 'success';
        $response['message'] = 'Data berhasil diupdate.';
    } else {
        $response['message'] = 'Gagal update: ' . ($stmt ? $stmt->error : $conn->error);
    }
} else {
    $response['message'] = 'Invalid request';
}

$conn->close();
echo json_encode($response);
?>