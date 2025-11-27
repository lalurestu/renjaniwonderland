<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');


file_put_contents('update_debug.log', date('Y-m-d H:i:s') . " - Update Request\n", FILE_APPEND);
file_put_contents('update_debug.log', "POST: " . print_r($_POST, true) . "\n", FILE_APPEND);
file_put_contents('update_debug.log', "FILES: " . print_r($_FILES, true) . "\n", FILE_APPEND);

include 'includes/db_connect.php';

if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit;
}


$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$description = isset($_POST['description']) ? trim($_POST['description']) : '';
$category = isset($_POST['category']) ? trim($_POST['category']) : '';
$stock = isset($_POST['stock']) ? intval($_POST['stock']) : 0;
$price = isset($_POST['price']) ? trim($_POST['price']) : '';
$discount = isset($_POST['discount']) ? intval($_POST['discount']) : 0;

file_put_contents('update_debug.log', "Parsed Data - ID: $id, Name: $name, Price: $price\n", FILE_APPEND);


if ($id <= 0) {
    echo json_encode(['status' => 'error', 'message' => 'ID tidak valid: ' . $id]);
    exit;
}

if (empty($name) || empty($description) || empty($category) || $stock <= 0 || empty($price)) {
    echo json_encode(['status' => 'error', 'message' => 'Data tidak lengkap']);
    exit;
}

try {

    $sql = "UPDATE souvenirs SET name=?, description=?, category=?, stock=?, price=?, discount=? WHERE id=?";
    file_put_contents('update_debug.log', "SQL: $sql\n", FILE_APPEND);
    
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("sssisii", $name, $description, $category, $stock, $price, $discount, $id);
    
    if ($stmt->execute()) {
        $affected = $stmt->affected_rows;
        file_put_contents('update_debug.log', "Update SUCCESS - Affected rows: $affected\n", FILE_APPEND);
        echo json_encode(['status' => 'success', 'message' => 'Souvenir berhasil diupdate']);
    } else {
        throw new Exception("Execute failed: " . $stmt->error);
    }
    
    $stmt->close();
    
} catch (Exception $e) {
    file_put_contents('update_debug.log', "ERROR: " . $e->getMessage() . "\n", FILE_APPEND);
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

$conn->close();
file_put_contents('update_debug.log', "=== Update Completed ===\n\n", FILE_APPEND);
?>