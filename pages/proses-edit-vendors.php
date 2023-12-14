<?php
// Koneksi ke database
include 'koneksi-posshop.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $vendors_id = $_POST['vendors_id'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Periksa koneksi ke database
    if ($connection->connect_error) {
        die("Koneksi database gagal: " . $connection->connect_error);
    }

    // Query untuk mengupdate data di database berdasarkan Id
    $sql = "UPDATE vendors SET code='$code', name='$name', phone_number='$phone_number', email='$email', address='$address' WHERE id=$vendors_id";

    if ($connection->query($sql) === TRUE) {
        header("Location: vendors.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    // Tutup koneksi database
    $connection->close();
} else {
    echo "Metode pengiriman data tidak valid.";
}