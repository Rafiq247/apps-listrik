<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "payment";

// Membuat koneksi menggunakan MySQLi
$koneksi = mysqli_connect($host, $user, $password, $database);

// Memeriksa koneksi
if (mysqli_connect_errno()) {
	echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
	exit();
}
