<?php
$servername = "localhost";
$username = "root"; // Username default XAMPP
$password = ""; // Password default XAMPP (kosong)
$dbname = "renjani_wonderland";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
