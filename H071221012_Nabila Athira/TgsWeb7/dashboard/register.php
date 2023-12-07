<?php
// Mengimpor kelas RegisterController untuk melakukan registrasi pengguna
include("../controllers/RegisterController.php");

// Memeriksa apakah formulir registrasi telah disubmit
if (isset($_POST['submit'])) {
    // Membuat objek RegisterController dan mengirimkan data dari formulir registrasi
    $register = new RegisterController($_POST);
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Pengaturan meta dan judul halaman -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Page</title>

    <!-- Mengimpor CSS dari Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background-color: darkorange;">
    <!-- Konten halaman web -->
    <div class="container col-lg-4">
        <!-- Judul halaman registrasi -->
        <h1 class="text-center mt-4">Registrasi</h1>
        <!-- Formulir registrasi pengguna -->
        <form method="POST">
            <!-- Input untuk Nama -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" required>
            </div>
            <!-- Input untuk NIM -->
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" name="nim" id="nim" required>
            </div>
            <!-- Input untuk Program Studi -->
            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi</label>
                <input type="text" class="form-control" name="prodi" id="prodi" required>
            </div>
            <!-- Input untuk Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <!-- Konfirmasi Password -->
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required>
            </div>
            <!-- Tombol untuk mengirimkan formulir registrasi -->
            <button type="submit" class="btn btn-primary" name="submit">Daftar</button>
        </form>
        <!-- Tautan untuk login jika pengguna sudah memiliki akun -->
        <!-- <p>Sudah daftar?
            <a href="./index.php" class="link-opacity-50-hover">Login di sini!</a>
        </p> -->
    </div>

    <!-- Mengimpor skrip JavaScript dari Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
