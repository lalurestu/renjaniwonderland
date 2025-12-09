<?php
include '../includes/db_connect.php';

header('Content-Type: application/json');

$response = ['status' => 'error', 'message' => ''];

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT * FROM photography_packages WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $package = $result->fetch_assoc();
            $response['status'] = 'success';
            $response['message'] = 'Data berhasil diambil';
            $response = array_merge($response, $package);
        } else {
            $response['message'] = 'Package tidak ditemukan';
        }
        $stmt->close();
    } else {
        $response['message'] = 'Error preparing statement: ' . $conn->error;
    }
} else {
    $response['message'] = 'ID tidak diberikan';
}

$conn->close();
echo json_encode($response);
?>