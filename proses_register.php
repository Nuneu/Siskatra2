<?php
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$role     = $_POST['role'];

// Simpan ke database
$sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
if (mysqli_query($conn, $sql)) {
    header("Location: register.php?status=success");
} else {
    header("Location: register.php?status=failed");
}
exit;
?>