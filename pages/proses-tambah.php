<?php
include '../oop/Database.php';
include '../oop/Product.php';

$database = new Database();
$connection = $database->getConnection();

$product = new Product($connection);

// Periksa koneksi
if ($connection->connect_error) {
    die("Koneksi gagal: " . $connection->connect_error);
}

$product_name = $_POST['product_name'];
$category_id = $_POST['category_id'];
$product_code = $_POST['product_code'];
$description = $_POST['description'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$image = $_FILES['image']['name'];
$file_tmp = $_FILES['image']['tmp_name'];

// Simpan gambar pertama ke direktori
move_uploaded_file($file_tmp[0], "../dist/upload/" . $image[0]);

// Buat array untuk menyimpan nama gambar yang akan disimpan dalam file JSON
$imageArray = array($image[0]);

// Loop untuk menyimpan gambar tambahan ke direktori dan array
for ($i = 1; $i < count($image); $i++) {
    move_uploaded_file($file_tmp[$i], "../dist/upload/" . $image[$i]);
    $imageArray[] = $image[$i];
}

// Panggil metode tambahProduct
if ($product->tambahProduct($product_name, $category_id, $product_code, $description, $price, $stock, $imageArray) === true) {
    header("Location: pos-shop.php");
    exit;
} else {
    echo "Error: Data produk tidak dapat disimpan.";
}

// Tutup koneksi database
$database->closeConnection();
?>

// Tanpa OOP
// Koneksi ke database
include 'koneksi-posshop.php';

// Periksa koneksi
if ($connection->connect_error) {
die("Koneksi gagal: " . $connection->connect_error);
}

$product_name = $_POST['product_name'];
$category_id = $_POST['category_id'];
$product_code = $_POST['product_code'];
$description = $_POST['description'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$image = $_FILES['image']['name'];
$file_tmp = $_FILES['image']['tmp_name'];

// Simpan gambar pertama ke direktori
move_uploaded_file($file_tmp[0], "../dist/upload/" . $image[0]);

// Buat array untuk menyimpan nama gambar yang akan disimpan dalam file JSON
$imageArray = array($image[0]);

// Loop untuk menyimpan gambar tambahan ke direktori dan array
for ($i = 1; $i < count($image); $i++) { move_uploaded_file($file_tmp[$i], "../dist/upload/" . $image[$i]);
    $imageArray[]=$image[$i]; } // Konversi array gambar menjadi JSON $imagesJson=json_encode($imageArray); // SQL untuk
    menyimpan data, termasuk JSON gambar
    $sql="INSERT INTO products (product_name, category_id, product_code, description, price, stock, image) VALUES ('$product_name', '$category_id', '$product_code', '$description', '$price', '$stock', '$imagesJson')"
    ; if ($connection->query($sql) === true) {
    header("Location: pos-shop.php");
    exit;
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi database
    $connection->close();