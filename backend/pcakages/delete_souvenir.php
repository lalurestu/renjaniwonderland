<?php
// Aktifkan error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: text/plain'); // Ubah ke text/plain untuk response sederhana

include 'includes/db_connect.php';

// Cek koneksi database
if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    echo "error";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    error_log("Deleting souvenir ID: " . $id);
    
    if ($id <= 0) {
        echo "error";
        exit;
    }
    
    try {
        $sql = "DELETE FROM souvenirs WHERE id = ?";
        error_log("Delete SQL: " . $sql);
        
        $stmt = $conn->prepare($sql);
        
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $conn->error);
        }
        
        $stmt->bind_param("i", $id);
        $execute_result = $stmt->execute();
        
        if ($execute_result) {
            error_log("Souvenir deleted successfully: " . $id);
            echo "success";
        } else {
            throw new Exception("Execute failed: " . $stmt->error);
        }
        
        $stmt->close();
        
    } catch (Exception $e) {
        error_log("Error in delete_souvenir: " . $e->getMessage());
        echo "error";
    }
} else {
    error_log("Invalid delete request");
    echo "error";
}

$conn->close();
?>