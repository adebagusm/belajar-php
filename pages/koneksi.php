<?php
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$database = 'online_shop';


$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Koneksi database gagal: " . $mysqli->connect_error);
}

?>
