<?php
session_start();
include '../oop/Database.php';
include '../oop/User.php';

$database = new Database();
$connection = $database->getConnection();

$user = new User($connection);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $username = $phone_number;
    $group_id = 3;

    if ($user->register($name, $email, $username, $phone_number, $password, $group_id)) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error while registering.";
    }
}

// Tutup koneksi database
$database->closeConnection();
?>

// Tanpa OOP
session_start();
// Koneksi ke database
include 'koneksi-posshop.php';

// Ambil data dari form
$name = $_POST['name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$password = $_POST['password'];

// Username dari no hp
$username = $phone_number;

// Hash password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Set group_id ke 3 (admin products)
$group_id = 3;

// Query
$sql = "INSERT INTO users (name, email, username, phone_number, password, group_id) VALUES ('$name', '$email',
'$username', '$phone_number', '$hashed_password', $group_id)";

if ($connection->query($sql) === TRUE) {
header("Location: login.php");
exit();
} else {
echo "Error: " . $sql . "<br>" . $connection->error;
}

// Tutup koneksi database
$connection->close();
?>