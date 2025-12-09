<?php
// get_gallery.php
header('Content-Type: application/json');
include '../includes/db_connect.php'; // Pastikan path koneksi benar

// Ambil foto dari kategori Wildlife & Human Interest
// Kita limit 5 foto terbaru agar slider tidak terlalu berat
$sql = "SELECT id, title, image, category FROM photography_packages 
        WHERE category IN ('Wildlife Photography', 'Human Interest Photography') 
        ORDER BY created_at DESC LIMIT 5";

$result = $conn->query($sql);
$photos = [];

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Fix path gambar jika perlu (hapus ../ jika ada)
        $row['image'] = str_replace('../', '', $row['image']);
        $photos[] = $row;
    }
    echo json_encode(['status' => 'success', 'data' => $photos]);
} else {
    echo json_encode(['status' => 'empty', 'message' => 'Belum ada foto']);
}

$conn->close();
?>