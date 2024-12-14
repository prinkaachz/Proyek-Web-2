<?php
$host = '127.0.0.1'; // Gunakan '127.0.0.1' alih-alih 'localhost'
$user = 'root';      // Nama pengguna default MySQL
$pass = '';          // Kosongkan jika tidak ada password
$db   = 'library';   // Pastikan nama database sesuai dengan yang ada di phpMyAdmin

// Buat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>  