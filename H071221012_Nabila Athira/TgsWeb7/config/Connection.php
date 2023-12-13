<?php
//endefinisikan konstanta DB_HOSTNAME dengan nilai 'localhost', yang merupakan alamat server database MySQL
define('DB_HOSTNAME', 'localhost');
//memiliki kontrol penuh atas server MySQL
define('DB_USERNAME', 'root');
//tidak ada kata sandi yang diperlukan untuk mengakses database
define('DB_PASSWORD', '');
define('DB_NAME', 'tugas_web_07');

class Connection
{
    //objek koneksi ke databse
    public $connect;

    public function __construct()
    {
        //membuat koneksi ke database MySQL menggunakan nama host, nama pengguna, dan kata sandi yang didefinisikan sebelumnya. 
        //Objek koneksi disimpan dalam properti $connect
        $this->connect = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);

        //Jika koneksi berhasil dibuat, maka metode create_db() dipanggil. Fungsi ini membuat database dengan nama yang didefinisikan dalam konstanta DB_NAME j
        if ($this->create_db()) {
            mysqli_select_db($this->connect, DB_NAME);
            //jika belum ada, dan kemudian membuat tabel pengguna (users) menggunakan metode create_table_user()
            $this->create_table_user();
        }
    }

    //membuat database dengan nama yang didefinisikan dalam konstanta DB_NAME
    private function create_db()
    {
        //jika belum ada. Menggunakan perintah SQL CREATE DATABASE IF NOT EXISTS.
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
        //menghapus spasi ekstra dari awal dan akhir string SQL
        return mysqli_query($this->connect, trim($query));
    }

  
}
