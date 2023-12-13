<?php

// Mengimpor kelas Connection dari file terpisah
include("../config/Connection.php");

// Mendefinisikan kelas RegisterController yang merupakan turunan dari kelas Connection
class RegisterController extends Connection
{
    // Konstruktor menerima data dari formulir pendaftaran
    public function __construct($data)
    {
        // Memanggil konstruktor kelas induk (Connection) untuk membuat koneksi ke database
        parent::__construct();

        // Mengambil data dari array data yang diterima dari formulir pendaftaran
        $nama = $data['nama'];
        $nim = $data['nim'];
        $prodi = $data['prodi'];
        $password = $data['password'];
        $confirmPassword = $data['confirmPassword'];

        // Membuat query SQL untuk memeriksa apakah NIM sudah terdaftar dalam tabel users
        $query = "SELECT * FROM users WHERE username = '$nim'";

        // Menjalankan query ke database menggunakan koneksi dari kelas induk
        $result = mysqli_query($this->connect, $query);

        // Memeriksa apakah NIM sudah terdaftar
        if (mysqli_num_rows($result) > 0) {
            // Jika sudah terdaftar, tampilkan pesan peringatan dan hentikan eksekusi skrip
            echo "<script>alert('NIM sudah terdaftar!')</script>";
            return;
        }

        // Memeriksa apakah password dan konfirmasi password sesuai
        if ($password == $confirmPassword) {
            // Jika sesuai, membuat query SQL untuk memasukkan data pengguna baru ke dalam tabel users
            $query = "INSERT INTO users VALUES ('', '$nim', '$nama', '$prodi', 'mahasiswa', '$password')";
            
            // Menjalankan query ke database menggunakan koneksi dari kelas induk
            $result = mysqli_query($this->connect, $query);

            // Mengarahkan pengguna ke halaman admin dengan pesan berhasil mendaftar
            header("Location: index-admin.php?message=Berhasil mendaftar!");

            // Mengembalikan hasil query untuk digunakan di tempat lain jika diperlukan
            return $result;
        } else {
            // Jika password dan konfirmasi password tidak sesuai, tampilkan pesan peringatan dan hentikan eksekusi skrip
            echo "<script>alert('Konfirmasi password tidak sesuai!')</script>";
            return;
        }
    }
}
