<?php
class User
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    // Login
    public function login($username)
    {
        $username = $this->connection->real_escape_string($username);

        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $this->connection->query($sql);

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            $result->close();
            return $user;
        } else {
            return null;
        }
    }

    // Register
    public function register($name, $email, $username, $phone_number, $password, $group_id)
    {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $name = $this->connection->real_escape_string($name);
        $email = $this->connection->real_escape_string($email);
        $username = $this->connection->real_escape_string($username);
        $phone_number = $this->connection->real_escape_string($phone_number);

        $sql = "INSERT INTO users (name, email, username, phone_number, password, group_id) VALUES ('$name', '$email', '$username', '$phone_number', '$hashed_password', $group_id)";

        return $this->connection->query($sql);
    }
}