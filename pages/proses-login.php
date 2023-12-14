<?php
session_start();
include '../oop/Database.php';
include '../oop/User.php';

$database = new Database();
$connection = $database->getConnection();

$user = new User($connection);

$username = $_POST['username'];
$password = $_POST['password'];

$storedUser = $user->login($username);

if ($storedUser) {
    $stored_password = $storedUser['password'];

    if ($password === $stored_password || password_verify($password, $stored_password)) {
        $_SESSION['username'] = $username;
        header("Location: ../index.php");
        exit();
    } else {
        header("Location: ../index.php?login_failed=1");
        exit();
    }
} else {
    header("Location: ../index.php?login_failed=1");
    exit();
}

// Tutup koneksi database
$database->closeConnection();
?>



// Tanpa OOP
session_start();
// Koneksi ke database
include 'koneksi-posshop.php';

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Query
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) == 1) {
$row = mysqli_fetch_assoc($result);
$stored_password = $row['password'];

// Cek jika kata sandi sesuai dengan salah satu cara
if ($password === $stored_password || password_verify($password, $stored_password)) {
// Login berhasil
$_SESSION['username'] = $username;
header("Location: ../index.php");
exit();
} else {
// Login gagal
header("Location: ../index.php?login_failed=1");
exit();
}
} else {
// Pengguna tidak ditemukan
header("Location: ../index.php?login_failed=1");
exit();
}

// Tutup koneksi database
mysqli_close($connection);

?>