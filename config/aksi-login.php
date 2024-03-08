<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Gunakan prepared statement untuk menghindari SQL injection
$stmt = $koneksi->prepare("SELECT userid, username, password FROM user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($userid, $db_username, $db_password);
    $stmt->fetch();

    if (password_verify($password, $db_password)) {
        $_SESSION['username'] = $db_username;
        $_SESSION['userid'] = $userid;
        $_SESSION['status'] = 'login';

        echo "<script>alert('Login berhasil'); window.location.replace('../admin/index.php');</script>";
    } else {
        echo "<script>alert('Username atau password salah!'); window.location.replace('../login.php');</script>";
    }
} else {
    echo "<script>alert('Username atau password salah!'); window.location.replace('../login.php');</script>";
}

$stmt->close();
$koneksi->close();
