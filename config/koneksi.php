<?php
$koneksi = mysqli_connect("localhost", "root", "", "nabila");

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
