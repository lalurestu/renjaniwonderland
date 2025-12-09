<?php
// Aktifkan error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

// Log semua data yang masuk
error_log("=== ADD SOUVENIR DEBUG ===");
error_log("POST Data: " . print_r($_POST, true));
error_log("FILES Data: " . print_r($_FILES, true));

include '../../includes/db_connect.php';

// Cek koneksi database
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi input
    $required_fields = ['name', 'description', 'category', 'stock', 'price'];
    $missing_fields = [];
    
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $missing_fields[] = $field;
        }
    }
    
    if (!empty($missing_fields)) {
        echo json_encode(['status' => 'error', 'message' => 'Field berikut harus diisi: ' . implode(', ', $missing_fields)]);
        exit;
    }

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $category = trim($_POST['category']);
    $stock = intval($_POST['stock']);
    $price = trim($_POST['price']);
    $discount = isset($_POST['discount']) ? intval($_POST['discount']) : 0;
    
    // Handle file upload
    $image = 'https://via.placeholder.com/400x200?text=Souvenir+Rinjani';
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $max_size = 2 * 1024 * 1024;
        
        if (in_array($_FILES['image']['type'], $allowed_types) && $_FILES['image']['size'] <= $max_size) {
            $uploadDir = '../../uploads/souvenirs/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $fileName = time() . '_' . uniqid() . '.' . $file_extension;
            $targetPath = $uploadDir . $fileName;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                $image = 'uploads/souvenirs/' . $fileName;
            }
        }
    }
    
    try {
        // PERBAIKAN: Query dengan jumlah parameter yang benar
        // 7 placeholder (?) untuk: name, description, category, stock, price, discount, image
        $sql = "INSERT INTO souvenirs (name, description, category, stock, price, discount, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        error_log("SQL: " . $sql);
        error_log("Parameters: name=$name, description=$description, category=$category, stock=$stock, price=$price, discount=$discount, image=$image");
        
        $stmt = $conn->prepare($sql);
        
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $conn->error);
        }
        
        // PERBAIKAN: "sssisis" - 7 karakter untuk 7 parameter
        // s=string, i=integer
        $bind_result = $stmt->bind_param("sssisis", $name, $description, $category, $stock, $price, $discount, $image);
        
        if (!$bind_result) {
            throw new Exception("Bind failed: " . $stmt->error);
        }
        
        $execute_result = $stmt->execute();
        
        if ($execute_result) {
            echo json_encode(['status' => 'success', 'message' => 'Souvenir berhasil ditambahkan']);
        } else {
            throw new Exception("Execute failed: " . $stmt->error);
        }
        
        $stmt->close();
        
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed. Use POST.']);
}

$conn->close();
?>