<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$role     = $_POST['role'];

$sql = "SELECT * FROM users WHERE username='$username' AND role='$role'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);

    if ($password === $row['PASSWORD']) { 
        $_SESSION['username'] = $row['username'];
        $_SESSION['role']     = $row['role'];
        header("Location: dashboard.php?status=success");
    } else {
        header("Location: login.php?status=wrongpass");
    }
} else {
    header("Location: login.php?status=nouser");
}
exit;
?>
