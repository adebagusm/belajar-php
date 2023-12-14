<?php
include '../oop/Database.php';
include '../oop/Product.php';

$database = new Database();
$connection = $database->getConnection();

$product = new Product($connection);

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    if ($product->deleteProduct($product_id)) {
        header("Location: pos-shop.php");
        exit;
    } else {
        echo "Error: Gagal menghapus produk.";
    }
} else {
    echo "ID Produk tidak ditemukan.";
}

// Tutup koneksi database
$database->closeConnection();
?>

// Tanpa OOP
// Koneksi ke database
include 'koneksi-posshop.php';
if (isset($_GET['id'])) {
$product_id = $_GET['id'];

// Periksa koneksi
if ($connection->connect_error) {
die("Koneksi gagal: " . $connection->connect_error);
}

// Query untuk menghapus produk berdasarkan 'id'
$sql = "DELETE FROM products WHERE id = $product_id";

if ($connection->query($sql) === TRUE) {
header("Location: pos-shop.php");
exit;
} else {
echo "Error: " . $sql . "<br>" . $connection->error;
}

// Tutup koneksi database
$connection->close();
} else {
echo "ID Produk tidak ditemukan.";
}