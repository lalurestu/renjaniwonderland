<?php
include 'includes/db_connect.php';
header('Content-Type: application/json');

$category = isset($_GET['category']) ? $_GET['category'] : 'Wildlife Photography';

$sql = "SELECT * FROM photography_packages WHERE category = ? AND active = 1 ORDER BY created_at DESC";
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
            'duration' => $row['duration'],
            'photos_included' => $row['photos_included'],
            'photographer_level' => $row['photographer_level'],
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