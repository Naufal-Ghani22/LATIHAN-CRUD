<?php
$host = "localhost";
$username = "root"; 
$password = ""; // default XAMPP kosong
$database = "db_perpustakaan"; // sesuaikan dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>