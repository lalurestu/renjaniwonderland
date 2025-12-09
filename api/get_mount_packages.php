<?php
header('Content-Type: application/json');

include '../includes/db_connect.php';

try {

    $sql = "SELECT * FROM packages WHERE package_type = 'mount' ORDER BY created_at DESC";
    $result = $conn->query($sql);
    
    $packages = [];
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $packages[] = [
                'id' => $row['id'],
                'title' => $row['title'],
                'description' => $row['description'],
                'duration' => $row['duration'],
                'price' => $row['price'],
                'route' => $row['route'],
                'difficulty' => $row['difficulty'],
                'min_age' => $row['min_age'],
                'image' => $row['image']
            ];
        }
    }
    
    echo json_encode($packages);
    
} catch (Exception $e) {
    echo json_encode(['error' => 'Failed to load packages: ' . $e->getMessage()]);
}

$conn->close();
?>