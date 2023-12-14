<?php
class Database {
    private $hostname = "localhost";
    private $username = "root";
    private $password = "Cimoloti12345";
    private $database = "pos_shop";
    private $connection;

    public function __construct() {
        $this->connection = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);

        if (!$this->connection) {
            die("Koneksi Gagal: " . mysqli_connect_error());
        }
    }

    public function getConnection() {
        return $this->connection;
    }

    public function closeConnection() {
        if ($this->connection) {
            mysqli_close($this->connection);
        }
    }
}