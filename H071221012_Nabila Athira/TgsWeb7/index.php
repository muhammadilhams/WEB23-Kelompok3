<?php
// Mengimpor kelas LoginController untuk melakukan proses login
include("./controllers/LoginController.php");

// Memeriksa apakah formulir login telah disubmit
if (isset($_POST['submit'])) {
    // Membuat objek LoginController dan mengirimkan data dari formulir login
    $login = new LoginController($_POST);
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Pengaturan meta dan judul halaman -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>

    <!-- Mengimpor CSS dari Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background-color: white;">
    <!-- Konten halaman web -->
    <div class="container col-lg-4">
        <!-- Judul halaman login -->
        <h1 class="text-center my-4">Silahkan Login</h1>

        <!-- Menampilkan pesan yang diterima melalui parameter URL -->
        <?php
        if (isset($_GET['message'])) {
            echo "<div class='alert alert-info' role='alert'>$_GET[message]</div>";
        }
        ?>

        <!-- Formulir login pengguna -->
        <form method="POST">
            <!-- Input untuk Username (NIM) -->
            <div class="mb-3">
                <label for="username" class="form-label">Username (NIM)</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <!-- Input untuk Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <!-- Tombol untuk mengirimkan formulir login -->
            <button type="submit" class="btn btn-primary" name="submit">Login</button>
        </form>
    </div>

    <!-- Mengimpor skrip JavaScript dari Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
