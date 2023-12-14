<?php
// Koneksi ke database
include 'koneksi-posshop.php';
if (isset($_GET['id'])) {
    $customers_id = $_GET['id'];

    // Periksa koneksi
    if ($connection->connect_error) {
        die("Koneksi gagal: " . $connection->connect_error);
    }

    // Query untuk menghapus produk berdasarkan 'id'
    $sql = "DELETE FROM customers WHERE id = $customers_id";

    if ($connection->query($sql) === TRUE) {
        header("Location: pelanggan.php");
    exit;
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    // Tutup koneksi database
    $connection->close();
} else {
    echo "ID Produk tidak ditemukan.";
}