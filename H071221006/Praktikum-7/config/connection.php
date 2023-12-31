<?php

define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'praktikum_7');

class Connection // atur koneksi ke db
{
    public $connect;

    public function __construct() // Connection menginisialisasi koneksi ke db
    {
        $this->connect = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);

        if ($this->connect->connect_error) {
            die("Koneksi database gagal: " . $this->connect->connect_error);
        }

        if ($this->create_db()) {
            mysqli_select_db($this->connect, DB_NAME);
            $this->create_table_user();
        }
    }

    private function create_db() 
    {
        return mysqli_query($this->connect, "CREATE DATABASE IF NOT EXISTS " . DB_NAME);
    }

    private function create_table_user()
    {
        $query = "CREATE TABLE IF NOT EXISTS users(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            nama VARCHAR(255) NOT NULL,
            prodi VARCHAR(255),
            role VARCHAR(20) NOT NULL,
            password VARCHAR(255) NOT NULL
        )";

        return mysqli_query($this->connect, trim($query));
    }
}