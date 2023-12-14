<?php
// Koneksi ke database
include 'koneksi-posshop.php';

// Periksa koneksi
if ($connection->connect_error) {
    die("Koneksi gagal: " . $connection->connect_error);
}

// Mengekstrak data dari form
$code = $_POST['code'];
$name = $_POST['name'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$address = $_POST['address'];

// SQL untuk menyimpan data
$sql = "INSERT INTO vendors (code, name, phone_number, email, address) VALUES ('$code', '$name', '$phone_number', '$email', '$address')";

if ($connection->query($sql) === true) {
    header("Location: vendors.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

// Tutup koneksi database
$connection->close();