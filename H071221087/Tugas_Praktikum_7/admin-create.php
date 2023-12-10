<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            padding-top: 75px;
            margin: 0;
            display: flex;
            justify-content: center;
            align-content: center;
        }

        .registration-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 1px solid;
            border-radius: 10px;
            padding: 20px 80px 30px;
        }

        .registration-head h3 {
            margin: 0;
            padding-bottom: 20px;
        }

        .registration-body {
            display: flex;
            flex-direction: column;
        }

        .registration-body input {
            margin-bottom: 20px;
            height: 40px;
            width: 250px;
        }

        .registration-body button {
            background-color: rgb(29, 174, 255);
            color: black;
            border-radius: 5px;
            position: relative;
            right: 100;
            width: 100px;
            height: 35px;
        }

        .menubtn {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .menubtn a {
            display: flex;
            align-items: center;
            width: 100px;
            height: 40px;
        }

        .menubtn input {
            background-color: rgb(29, 174, 255);
            border-radius: 5px;
            width: 100px;
            height: 40px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <div class="registration-box">
        <div class="registration-head">
            <h3>Tambah Data Mahasiswa</h3>
        </div>
        <div>
            <form action="admin-create.php" method="post">
                <div class="registration-body">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="text" name="fullname" placeholder="Nama Lengkap" required>
                    <input type="text" name="nim" placeholder="NIM" required>
                    <input type="text" name="prodi" placeholder="Prodi" required>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="menubtn">
                    <a href="admin.php">Kembali</a>
                    <input id="submit" type="submit" value="Tambah" name="register"></input>
                </div>
                <div class="notes"></div>
        </div>
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
            echo "<script>document.querySelector('.notes').innerHTML = '*Username sudah terdaftar. <br>Gunakan username lain.';</script>";
        } else {
            // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO mahasiswa (Username, Fullname, NIM, Prodi, `Password`) VALUES ('$username', '$fullname', '$nim', '$prodi', '$password')";

            if ($conn->query($query) === TRUE) {
                echo "<script>document.querySelector('.notes').innerHTML = '*Penambahan data berhasil!';</script>";
                exit;
            } else {
                echo "<script>document.querySelector('.notes').innerHTML = '*Penambahan data gagal. Silakan coba lagi.';</script>";
            }
        }

        $conn->close();
    }
    ?>
</body>

</html>