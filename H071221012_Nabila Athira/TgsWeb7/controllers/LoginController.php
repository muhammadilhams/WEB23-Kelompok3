<?php

// Mengimpor kelas Connection dari file terpisah
include("./config/Connection.php");

// Mendefinisikan kelas LoginController yang merupakan turunan dari kelas Connection
class LoginController extends Connection
{
    // Konstruktor menerima data dari form login
    public function __construct($data)
    {
        // Memanggil konstruktor kelas induk (Connection) untuk membuat koneksi ke database
        parent::__construct();

        // Mengambil data username dan password dari array data yang diterima
        $username = $data['username'];
        $password = $data['password'];

        // Membuat query SQL untuk memeriksa apakah username dan password cocok dalam tabel users
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

        // Menjalankan query ke database menggunakan koneksi dari kelas induk
        $result = mysqli_query($this->connect, $query);

        // Memeriksa apakah ada baris data yang sesuai dengan kriteria
        if (mysqli_num_rows($result) > 0) {
            // Jika sesuai, mengambil data pengguna dari hasil query
            while ($data = mysqli_fetch_assoc($result)) {
                // Memulai sesi PHP
                session_start();

                // Menyimpan data pengguna ke dalam variabel sesi
                $_SESSION['id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['nama'] = $data['nama'];
                $_SESSION['prodi'] = $data['prodi'];
                $_SESSION['status'] = 'login';

                // Memeriksa peran pengguna (admin atau pengguna biasa)
                if ($data['role'] == 'admin') {
                    // Jika admin, redirect ke dashboard admin dengan pesan selamat datang
                    header("Location: dashboard/index-admin.php?message=Selamat datang kak");
                } else {
                    // Jika pengguna biasa, redirect ke dashboard pengguna biasa dengan pesan selamat datang
                    header("Location: dashboard/index.php?message=Selamat datang");
                }

                // Menghentikan eksekusi skrip
                return;
            }
        } else {
            // Jika tidak ada baris data yang sesuai, redirect kembali ke halaman login dengan pesan kesalahan
            header("Location: ?message=Password salah!");
            // Menghentikan eksekusi skrip
            return;
        }
    }
}
