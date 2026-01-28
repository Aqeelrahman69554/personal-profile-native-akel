<?php
$servername = "localhost";
$nameuser = "root";
$password = "";
$database = "personal-profile-native-akel";

$conn = new mysqli($servername, $nameuser, $password, $database);

if ($conn->connect_error) {
    die("koneksi anda gagal" . $conn->connect_error);
}
// echo "koneksi berhasil";

$base_url = "http://" . $_SERVER['HTTP_HOST'] . "/personal-profile-native-akel/";
?>