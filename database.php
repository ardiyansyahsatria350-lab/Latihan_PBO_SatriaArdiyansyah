<?php
$host = "localhost";
$username = "root"; // Default XAMPP/Laragon biasanya 'root'
$password = "";     // Kosongkan jika tidak ada password di localhost kamu
$database = "db_latihan_pbo_ti1c_satriaardiyansyah"; // Sesuaikan dengan namamu

// Membuat koneksi menggunakan MySQLi Object-Oriented
$koneksi = new mysqli($host, $username, $password, $database);

// Mengecek koneksi
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}
?>