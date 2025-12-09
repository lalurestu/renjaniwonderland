<?php
include '../../includes/db_connect.php';

header('Content-Type: application/json');

$response = ['status' => 'error', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $package_type = $_POST['package_type'] ?? '';
    $title = $_POST['title'] ?? '';
    $duration = $_POST['duration'] ?? '';
    $price = $_POST['price'] ?? '';
    $description = $_POST['description'] ?? '';
    $route = $_POST['route'] ?? '';
    $difficulty = $_POST['difficulty'] ?? '';
    $min_age = $_POST['min_age'] ?? '';

    if (empty($id) || empty($package_type) || empty($title) || empty($duration) || empty($price) || empty($description) || empty($difficulty) || empty($min_age)) {
        $response['message'] = 'Semua field harus diisi.';
        echo json_encode($response);
        exit;
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../assets/images/';
        
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
            $image = 'assets/images/' . $fileName;
            $sql = "UPDATE packages SET package_type=?, image=?, title=?, duration=?, price=?, description=?, route=?, difficulty=?, min_age=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("sssssssssi", $package_type, $image, $title, $duration, $price, $description, $route, $difficulty, $min_age, $id);
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
        $sql = "UPDATE packages SET package_type=?, title=?, duration=?, price=?, description=?, route=?, difficulty=?, min_age=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ssssssssi", $package_type, $title, $duration, $price, $description, $route, $difficulty, $min_age, $id);
        } else {
            $response['message'] = 'Error preparing statement: ' . $conn->error;
            echo json_encode($response);
            exit;
        }
    }

    if ($stmt) {
        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'Data berhasil diupdate.';
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