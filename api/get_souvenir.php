<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');


file_put_contents('get_debug.log', date('Y-m-d H:i:s') . " - Get Request\n", FILE_APPEND);
file_put_contents('get_debug.log', "GET: " . print_r($_GET, true) . "\n", FILE_APPEND);

include '../includes/db_connect.php';

if ($conn->connect_error) {
    file_put_contents('get_debug.log', "Database connection failed: " . $conn->connect_error . "\n", FILE_APPEND);
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    file_put_contents('get_debug.log', "Processing ID: $id\n", FILE_APPEND);
    
    if ($id <= 0) {
        echo json_encode(['status' => 'error', 'message' => 'ID tidak valid']);
        exit;
    }

    $sql = "SELECT * FROM souvenirs WHERE id = ?";
    file_put_contents('get_debug.log', "SQL: $sql\n", FILE_APPEND);
    
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $souvenir = $result->fetch_assoc();
            file_put_contents('get_debug.log', "Data found: " . $souvenir['name'] . "\n", FILE_APPEND);
            

            echo json_encode([
                'status' => 'success',
                'id' => $souvenir['id'],
                'name' => $souvenir['name'],
                'description' => $souvenir['description'],
                'category' => $souvenir['category'],
                'stock' => $souvenir['stock'],
                'price' => $souvenir['price'],
                'discount' => $souvenir['discount'],
                'image' => $souvenir['image']
            ]);
        } else {
            file_put_contents('get_debug.log', "No data found for ID: $id\n", FILE_APPEND);
            echo json_encode(['status' => 'error', 'message' => 'Souvenir tidak ditemukan']);
        }
        
        $stmt->close();
    } else {
        file_put_contents('get_debug.log', "Prepare failed: " . $conn->error . "\n", FILE_APPEND);
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $conn->error]);
    }
} else {
    file_put_contents('get_debug.log', "No ID provided\n", FILE_APPEND);
    echo json_encode(['status' => 'error', 'message' => 'ID tidak diberikan']);
}

$conn->close();
file_put_contents('get_debug.log', "=== Get Completed ===\n\n", FILE_APPEND);
?>