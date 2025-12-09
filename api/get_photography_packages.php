<?php
include '../includes/db_connect.php';
header('Content-Type: application/json');

$category = isset($_GET['category']) ? $_GET['category'] : 'Wildlife Photography';

// Hapus 'duration', 'photos_included', 'photographer_level' dari pengambilan data
$sql = "SELECT id, category, title, description, price, image FROM photography_packages WHERE category = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = [
            'id' => $row['id'],
            'title' => $row['title'],
            'description' => $row['description'],
            // Field dihapus
            'price' => $row['price'],
            'image' => $row['image']
        ];
    }
    echo json_encode(['status' => 'success', 'data' => $data]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No photography packages found']);
}

$stmt->close();
$conn->close();
?>