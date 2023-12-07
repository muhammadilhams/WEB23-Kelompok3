<?php
// Mengimpor kelas Connection dari file terpisah
include("../config/Connection.php");

// Menginisialisasi variabel nama, nim, dan prodi
$nama = "";
$nim = "";
$prodi = "";

// Memulai sesi PHP
session_start();

// Mengambil data dari sesi pengguna (nama, nim, dan prodi)
$nama = $_SESSION['nama'];
$nim = $_SESSION['username'];
$prodi = $_SESSION['prodi'];

// Memeriksa apakah pengguna sudah login, jika tidak, mengarahkan kembali ke halaman login
if ($_SESSION['status'] != 'login') {
    header("location:../index.php?message=Silahkan login terlebih dahulu!");
}

// Memeriksa apakah tombol logout ditekan
if (isset($_POST['logout'])) {
    // Menghancurkan sesi dan mengarahkan pengguna ke halaman login dengan pesan selamat tinggal
    session_destroy();
    header("location:../index.php?message=Sampai jumpa!");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Pengaturan meta dan judul halaman -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>

    <!-- Mengimpor CSS dari Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Menentukan gaya CSS -->
    <style>
        .mx-auto {
            width: 900px;
        }

        .card {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- Konten halaman web -->
    <div class="container mt-4 mx-auto">
        <!-- Judul halaman -->
        <h1 class="text-center mb-4">Dashboard Mahasiswa</h1>
        <!-- Menampilkan pesan selamat datang dengan nama pengguna -->
        <h4 class="text-center mb-5"><?= "Selamat Datang, $nama" ?></h4>

        <!-- Menampilkan pesan yang diterima melalui parameter URL -->
        <?php
        if (isset($_GET['message'])) {
            echo "<div class='alert alert-info' role='alert'>$_GET[message]</div>";
        }
        ?>

        <!-- Kartu informasi pengguna -->
        <div class="card">
            <div class="card-body">
                <!-- Menampilkan foto profil pengguna -->
                <div class="d-flex justify-content-center">
                    <img src="../images/profil.jfif" class="card-img-top w-25" alt="Foto Profil">
                </div>
                <!-- Formulir informasi pengguna yang tidak dapat diubah -->
                <div class="mt-5 w-75 mx-auto">
                    <!-- Input untuk Nama -->
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>" disabled>
                        </div>
                    </div>
                    <!-- Input untuk NIM -->
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nim" name="nim" value="<?= $nim ?>" disabled>
                        </div>
                    </div>
                    <!-- Input untuk Program Studi -->
                    <div class="mb-3 row">
                        <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prodi" name="prodi" value="<?= $prodi ?>" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulir logout yang mengarahkan ke halaman logout saat ditekan -->
    <form action="" method="POST" class="position-fixed top-0 end-0 m-2">
        <button type="submit" name="logout" class="btn btn-lg btn-danger">Logout</button>
    </form>

    <!-- Mengimpor skrip JavaScript dari Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
