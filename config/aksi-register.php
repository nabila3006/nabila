<?php
include 'koneksi.php';

if (isset($_POST['username'], $_POST['password'], $_POST['email'], $_POST['namalengkap'], $_POST['alamat'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Gunakan fungsi hash
    $email = $_POST['email'];
    $namalengkap = $_POST['namalengkap'];
    $alamat = $_POST['alamat'];


    $sql = mysqli_query($koneksi, "INSERT INTO user (username, password, email, namalengkap, alamat) 
                                   VALUES ('$username', '$password', '$email', '$namalengkap', '$alamat')");

    if ($sql) {
        echo "<script>alert('Daftar Telah Berhasil')</script>";
        echo "<script>window.location='../login.php'</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Data tidak lengkap";
}
