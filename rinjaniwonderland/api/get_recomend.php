<?php
// get_recommendations.php
include '../includes/db_connect.php';

header('Content-Type: application/json');

// Query untuk mengambil 3 paket secara acak
// Pastikan nama tabel sesuai dengan database Anda (misal: packages atau destinations)
$sql = "SELECT id, title, description, image, package_type FROM packages ORDER BY RAND() LIMIT 3";
$result = $conn->query($sql);

$recommendations = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Bersihkan deskripsi agar tidak terlalu panjang (opsional)
        $row['description'] = mb_strimwidth($row['description'], 0, 100, "...");
        $recommendations[] = $row;
    }
    echo json_encode(['status' => 'success', 'data' => $recommendations]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Tidak ada data']);
}

$conn->close();
?>