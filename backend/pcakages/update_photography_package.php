<?php
include 'includes/db_connect.php';

header('Content-Type: application/json');

$response = ['status' => 'error', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $category = $_POST['category'] ?? '';
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $duration = $_POST['duration'] ?? '';
    $photos_included = $_POST['photos_included'] ?? '';
    $photographer_level = $_POST['photographer_level'] ?? '';
    $price = $_POST['price'] ?? '';

    if (empty($id) || empty($category) || empty($title) || empty($description) || empty($duration) || empty($photos_included) || empty($photographer_level) || empty($price)) {
        $response['message'] = 'Semua field harus diisi.';
        echo json_encode($response);
        exit;
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'assets/images/';
        
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        $fileName = time() . '_' . basename($_FILES['image']['name']);
        $filePath = $uploadDir . $fileName;

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $fileType = $_FILES['image']['type'];
        
        if (!in_array($fileType, $allowedTypes)) {
            $response['message'] = 'Hanya file gambar (JPG, PNG, GIF, WEBP) yang diizinkan.';
            echo json_encode($response);
            exit;
        }

        if ($_FILES['image']['size'] > 2 * 1024 * 1024) {
            $response['message'] = 'Ukuran file maksimal 2MB.';
            echo json_encode($response);
            exit;
        }

        if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
            $image = $filePath;
            $sql = "UPDATE photography_packages SET category=?, title=?, description=?, duration=?, photos_included=?, photographer_level=?, price=?, image=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("ssssssssi", $category, $title, $description, $duration, $photos_included, $photographer_level, $price, $image, $id);
            } else {
                $response['message'] = 'Error preparing statement: ' . $conn->error;
                echo json_encode($response);
                exit;
            }
        } else {
            $response['message'] = 'Gagal mengunggah file gambar.';
            echo json_encode($response);
            exit;
        }
    } else {
        $sql = "UPDATE photography_packages SET category=?, title=?, description=?, duration=?, photos_included=?, photographer_level=?, price=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("sssssssi", $category, $title, $description, $duration, $photos_included, $photographer_level, $price, $id);
        } else {
            $response['message'] = 'Error preparing statement: ' . $conn->error;
            echo json_encode($response);
            exit;
        }
    }

    if ($stmt) {
        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'Data photography package berhasil diupdate.';
        } else {
            $response['message'] = 'Gagal update data: ' . $stmt->error;
        }
        $stmt->close();
    } else {
        $response['message'] = 'Error preparing statement: ' . $conn->error;
    }
} else {
    $response['message'] = 'Invalid request method.';
}

$conn->close();
echo json_encode($response);
?>