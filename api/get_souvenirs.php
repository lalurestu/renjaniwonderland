<?php

header('Content-Type: application/json');


include '../includes/db_connect.php';

try {

    $sql = "SELECT * FROM souvenirs WHERE status = 'active' ORDER BY category, name";
    $result = $conn->query($sql);
    
    $souvenirs = array();
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $souvenirs[] = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'description' => $row['description'],
                'category' => $row['category'],
                'price' => $row['price'],
                'discount' => $row['discount'],
                'image' => $row['image']
            );
        }
    }
    
    echo json_encode($souvenirs);
    
} catch (Exception $e) {

    echo json_encode(array());
}

$conn->close();
?>