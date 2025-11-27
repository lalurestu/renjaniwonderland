<?php
include 'includes/db_connect.php';

header('Content-Type: application/json');

$response = ['status' => 'error', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['category'] ?? '';
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $duration = $_POST['duration'] ?? '';
    $photos_included = $_POST['photos_included'] ?? '';
    $photographer_level = $_POST['photographer_level'] ?? '';
    $price = $_POST['price'] ?? '';

    if (empty($category) || empty($title) || empty($description) || empty($duration) || empty($photos_included) || empty($photographer_level) || empty($price)) {
        $response['message'] = 'Semua field harus diisi.';
        echo json_encode($response);
        exit;
    }

    $image = '';
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
        } else {
            $response['message'] = 'Gagal mengunggah file gambar.';
            echo json_encode($response);
            exit;
        }
    } else {
        $response['message'] = 'File gambar wajib diunggah.';
        echo json_encode($response);
        exit;
    }

    $sql = "INSERT INTO photography_packages (category, title, description, duration, photos_included, photographer_level, price, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssssss", $category, $title, $description, $duration, $photos_included, $photographer_level, $price, $image);

        if ($stmt->execute()) {
            $last_id = $conn->insert_id;
            $response['status'] = 'success';
            $response['message'] = 'Data photography package berhasil ditambahkan.';
            $response['id'] = $last_id;
            $response['category'] = $category;
            $response['title'] = $title;
            $response['description'] = $description;
            $response['duration'] = $duration;
            $response['photos_included'] = $photos_included;
            $response['photographer_level'] = $photographer_level;
            $response['price'] = $price;
            $response['image'] = $image;
        } else {
            $response['message'] = 'Gagal menyimpan data ke database: ' . $stmt->error;
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