<?php
include '../../includes/db_connect.php';

header('Content-Type: application/json');

$response = ['status' => 'error', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['category'] ?? '';
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? '';

    // Validasi input (Field lama dihapus)
    if (empty($category) || empty($title) || empty($description) || empty($price)) {
        $response['message'] = 'Semua field (Kategori, Judul, Deskripsi, Harga) harus diisi.';
        echo json_encode($response);
        exit;
    }

    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../assets/images/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
        
        $fileName = time() . '_' . basename($_FILES['image']['name']);
        $filePath = $uploadDir . $fileName;

        // Validasi Gambar
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (!in_array($_FILES['image']['type'], $allowedTypes)) {
            echo json_encode(['status'=>'error', 'message'=>'Format gambar salah']); exit;
        }

        if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
            $image = 'assets/images/' . $fileName;
        } else {
            echo json_encode(['status'=>'error', 'message'=>'Gagal upload gambar']); exit;
        }
    } else {
        echo json_encode(['status'=>'error', 'message'=>'Gambar wajib diisi']); exit;
    }

    // SQL INSERT DIPERBARUI (Hapus kolom duration, photos_included, photographer_level)
    $sql = "INSERT INTO photography_packages (category, title, description, price, image) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Binding param disesuaikan (5 string: sssss)
        $stmt->bind_param("sssss", $category, $title, $description, $price, $image);

        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'Data berhasil ditambahkan.';
        } else {
            $response['message'] = 'Gagal database: ' . $stmt->error;
        }
        $stmt->close();
    } else {
        $response['message'] = 'Error prepare: ' . $conn->error;
    }
} else {
    $response['message'] = 'Invalid request';
}

$conn->close();
echo json_encode($response);
?>