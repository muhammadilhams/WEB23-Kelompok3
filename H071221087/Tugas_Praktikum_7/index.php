<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login Form</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Form Login
                        </div>
                        <div class="card-body">
                            <form action="index.php" method="post">
                                <div class="form-group">
                                    <label for="username">Username:</label>
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                </div>

                                <input class="btn btn-primary" id="login" type="submit" value="Login" name="login"></input>

                                <div class="register">
                                    <p>Belum punya akun? <a href="registration.php">Daftar disini!</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php
    session_start();
    if (isset($_POST['login'])) {
        $db_host = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "praktikum7";

        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $_SESSION['username'] = $_POST['username'];
        $username = $_SESSION['username'];
        $password = $_POST['password'];

        $query = "SELECT Password FROM mahasiswa WHERE Username = '$username'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $db_password = $row['Password'];

            if ($username === "admin") {
                if ($password === $db_password) {
                    $query_user_info = "SELECT Fullname, NIM, Prodi FROM mahasiswa WHERE Username = '$username'";
                    $result_user_info = $conn->query($query_user_info);

                    if ($result_user_info->num_rows > 0) {
                        $user_info = $result_user_info->fetch_assoc();
                        $_SESSION['fullname'] = $user_info['Fullname'];
                        $_SESSION['nim'] = $user_info['NIM'];
                        $_SESSION['prodi'] = $user_info['Prodi'];
                    }

                    $_SESSION['username'] = $username;
                    header("Location: admin.php");
                    exit;
                } else {
                    echo "<script>document.querySelector('.notes').innerHTML = 'Kata sandi salah.';</script>";
                }
            } else {
                if (($password == $db_password)) {
                    $query_user_info = "SELECT Fullname, NIM, Prodi FROM mahasiswa WHERE Username = '$username'";
                    $result_user_info = $conn->query($query_user_info);

                    if ($result_user_info->num_rows > 0) {
                        $user_info = $result_user_info->fetch_assoc();
                        $_SESSION['fullname'] = $user_info['Fullname'];
                        $_SESSION['nim'] = $user_info['NIM'];
                        $_SESSION['prodi'] = $user_info['Prodi'];
                    }

                    $_SESSION['username'] = $username;
                    header("Location: mahasiswa.php");
                    exit;
                } else {
                    echo "<script>document.querySelector('.notes').innerHTML = 'Kata sandi salah.';</script>";
                }
            }
        } else {
            echo "<script>document.querySelector('.notes').innerHTML = '*Username tidak ditemukan';</script>";
        }

        $conn->close();
    }
    ?>
</body>

</html>