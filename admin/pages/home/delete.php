<?php
include __DIR__ . "/../../../connection.php";


$id = $_GET['id'];
$delete = mysqli_query($conn, "DELETE FROM resum WHERE id='$id'");

if ($delete) {
    header("Location: index.php");
} else {
    echo "Gagal menghapus data!";
}