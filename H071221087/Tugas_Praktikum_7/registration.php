<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-5">
        <h2 class="text-center">Form Registrasi</h2>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="registration.php" method="post">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan Username Anda" required>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" name="fullname" class="form-control" id="nama" placeholder="Masukkan Nama Anda" required>
                    </div>

                    <div class="form-group">
                        <label for="nim">Nim:</label>
                        <input type="text" name="nim" class="form-control" id="nim" placeholder="Masukkan Nim Anda" required>
                    </div>

                    <div class="form-group">
                        <label for="prodi">Prodi:</label>
                        <input type="text" name="prodi" class="form-control" id="prodi" placeholder="Masukkan Prodi Anda" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" name="password" class="form-control" id="password" placeholder="Masukkan Password Anda" required>
                    </div>

                    <div class="menubtn">
                        <a href="index.php" class="mr-2">Kembali</a> 
                        <input id="submit" type="submit" value="Daftar" name="register" class="btn btn-primary"></input>
                    </div>

                    <div class="notes"></div>
                </form>
            </div>
        </div>

    <?php
    if (isset($_POST['register'])) {
        $db_host = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "praktikum7";

        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $nim = $_POST['nim'];
        $prodi = $_POST['prodi'];
        $password = $_POST['password'];

        $check_query = "SELECT Username FROM mahasiswa WHERE Username = '$username'";
        $check_result = $conn->query($check_query);

        if ($check_result->num_rows > 0) {
            echo "<script>document.querySelector('.notes').innerHTML = '*Username sudah terdaftar. <br>Silakan gunakan username lain.';</script>";
        } else {
            // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO mahasiswa (Username, Fullname, NIM, Prodi, `Password`) VALUES ('$username', '$fullname', '$nim', '$prodi', '$password')";

            if ($conn->query($query) === TRUE) {
                echo "<script>document.querySelector('.notes').innerHTML = '*Registrasi telah berhasil!';</script>";
                exit;
            } else {
                echo "<script>document.querySelector('.notes').innerHTML = '*Registrasi gagal. Silakan coba lagi.';</script>";
            }
        }

        $conn->close();
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>