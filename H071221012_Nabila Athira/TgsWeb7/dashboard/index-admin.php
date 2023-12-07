<?php
// Mengimpor kelas Connection dari file terpisah
include("../config/Connection.php");

// Membuat objek koneksi ke database
$connection = new Connection();

// Menginisialisasi variabel nama_admin
$nama_admin = "";

// Memulai sesi PHP
session_start();

// Mengambil nama pengguna dari sesi jika pengguna sudah login
$nama_admin = $_SESSION['nama'];

// Memeriksa apakah pengguna sudah login, jika tidak, mengarahkan kembali ke halaman login
if ($_SESSION['status'] != 'login') {
    header("location:../index.php?message=Silahkan login terlebih dahulu deek dek!");
}

// Memeriksa apakah tombol logout telah ditekan
if (isset($_POST['logout'])) {
    // Menghapus sesi dan mengarahkan pengguna ke halaman login dengan pesan selamat tinggal
    session_destroy();
    header("location:../index.php?message=Sampai jumpa kak admin");
}

// Menginisialisasi variabel sukses dan error
$success = "";
$error = "";

// Menginisialisasi variabel nim, nama, dan prodi
$nim = "";
$nama = "";
$prodi = "";

// Memeriksa operasi yang diminta (edit atau delete)
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

// Memeriksa apakah operasi adalah edit
if ($op == 'edit') {
    // Mengambil ID pengguna yang akan diedit dari parameter URL
    $id = $_GET['id'];

    // Membuat query SQL untuk mengambil data pengguna berdasarkan ID
    $query = "SELECT * FROM users WHERE id = '$id'";

    // Menjalankan query ke database menggunakan koneksi dari objek Connection
    $result = mysqli_query($connection->connect, $query);

    // Memeriksa apakah data ditemukan
    $data = mysqli_fetch_assoc($result);

    // Memeriksa apakah data ditemukan, jika tidak, menampilkan pesan kesalahan
    if (!$data) {
        $error = "Data tidak ditemukan";
    } else {
        // Mengisi variabel nim, nama, dan prodi dengan data pengguna yang akan diedit
        $nim = $data['username'];
        $nama = $data['nama'];
        $prodi = $data['prodi'];
    }
}

// Memeriksa apakah tombol simpan ditekan (untuk menyimpan perubahan data pengguna)
if (isset($_POST['simpan'])) {
    // Mengambil data dari formulir
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];

    // Memeriksa apakah semua data diisi
    if ($nim && $nama && $prodi) {
        // Memeriksa apakah operasi adalah edit
        if ($op == 'edit') {
            // Jika edit, membuat query SQL untuk memperbarui data pengguna
            $query = "UPDATE users SET username='$nim', nama='$nama', prodi='$prodi' WHERE id='$id'";
            $result = mysqli_query($connection->connect, $query);

            // Memeriksa apakah pembaruan berhasil
            if ($result) {
                $success = "Data berhasil diperbarui";
            } else {
                $error = "Data gagal diperbarui";
            }
        }
    } else {
        // Jika ada data yang tidak diisi, menampilkan pesan kesalahan
        $error = "Semua data harus diisi!";
    }
}

// Memeriksa apakah operasi adalah delete
if ($op == 'delete') {
    // Mengambil ID pengguna yang akan dihapus dari parameter URL
    $id = $_GET['id'];

    // Membuat query SQL untuk menghapus data pengguna berdasarkan ID
    $query = "DELETE FROM users WHERE id='$id'";

    // Menjalankan query ke database menggunakan koneksi dari objek Connection
    $result = mysqli_query($connection->connect, $query);

    // Memeriksa apakah penghapusan berhasil
    if ($result) {
        $success = "Berhasil menghapus data";
    } else {
        $error = "Gagal menghapus data";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Pengaturan meta dan judul halaman -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>

    <!-- Mengimpor CSS dari Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Menentukan gaya CSS -->
    <style>
        .mx-auto {
            width: 700px;
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
        <h1 class="text-center mb-4">Dashboard Admin</h1>
        <!-- Menampilkan nama admin yang sedang login -->
        <h4 class="text-center mb-5"><?= "Selamat Datang Kak $nama_admin" ?></h4>

        <!-- Menampilkan pesan yang diterima melalui parameter URL -->
        <?php
        if (isset($_GET['message'])) {
            echo "<div class='alert alert-info' role='alert'>$_GET[message]</div>";
        }
        ?>

        <!-- Form untuk menambah atau mengedit data mahasiswa -->
        <div class="card">
            <!-- Menampilkan tombol untuk menambah akun -->
            <p>
                <a href="./register.php" class="link-opacity-50-hover">Tambah Akun!</a>
            </p>
            <div class="card-header">
                Update Data Mahasiswa
            </div>
            <div class="card-body">
                <!-- Menampilkan pesan kesalahan jika ada -->
                <?php if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <?php
                    header("refresh:3;url=index-admin.php");
                }
                // Menampilkan pesan keberhasilan jika ada
                if ($success) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?= $success ?>
                    </div>
                <?php
                    header("refresh:3;url=index-admin.php");
                }
                // Menampilkan formulir pengeditan data jika operasi adalah edit
                if ($op != "" && $op == 'edit') {
                ?>
                    <form action="" method="post">
                        <!-- Input untuk NIM -->
                        <div class="mb-3 row">
                            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nim" name="nim" value="<?= $nim ?>" required>
                            </div>
                        </div>
                        <!-- Input untuk Nama -->
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>" required>
                            </div>
                        </div>
                        <!-- Input untuk Program Studi -->
                        <div class="mb-3 row">
                            <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="prodi" name="prodi" value="<?= $prodi ?>" required>
                            </div>
                        </div>
                        <!-- Tombol untuk menyimpan perubahan atau membersihkan formulir -->
                        <div class="d-flex justify-content-center gap-3">
                            <button type="submit" name="simpan" class="btn btn-primary">Update</button>
                            <a href="index-admin.php" class="btn btn-warning">Clear</a>
                        </div>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>

        <!-- Tabel untuk menampilkan data mahasiswa -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <!-- Tabel untuk menampilkan data -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Membuat query SQL untuk mengambil data mahasiswa dengan peran 'mahasiswa'
                        $query = "SELECT * FROM users WHERE role = 'mahasiswa'";
                        // Menjalankan query ke database menggunakan koneksi dari objek Connection
                        $result = mysqli_query($connection->connect, $query);
                        // Inisialisasi nomor urut
                        $no = 1;
                        // Menampilkan data dalam tabel
                        while ($data = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <!-- Nomor urut -->
                                <td scope="row"><?= $no++ ?></td>
                                <!-- Nama -->
                                <td scope="row"><?= $data['nama'] ?></td>
                                <!-- NIM -->
                                <td scope="row"><?= $data['username'] ?></td>
                                <!-- Program Studi -->
                                <td scope="row"><?= $data['prodi'] ?></td>
                                <!-- Aksi (edit dan hapus) -->
                                <td scope="row">
                                    <!-- Tombol untuk mengedit data -->
                                    <a href="?op=edit&id=<?= $data['id'] ?>">
                                        <button type="button" class="btn btn-sm btn-warning">Edit</button>
                                    </a>
                                    <!-- Tombol untuk menghapus data (dengan konfirmasi) -->
                                    <a href="?op=delete&id=<?= $data['id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Formulir logout yang mengarahkan ke halaman logout saat ditekan -->
    <form action="" method="POST" class="position-fixed top-0 end-0 m-2">
        <button type="submit" name="logout" class="btn btn-lg btn-danger">Logout</button>
    </form>

    <!-- Mengimpor skrip JavaScript dari Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL
