<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .check-box {
            width: 500px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 1px solid;
            border-radius: 10px;
            padding: 20px 70px 30px;
            margin: 0 auto;
            margin-top: 125px;
        }

        .body {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .body input {
            margin-top: 15px;
            margin-bottom: 20px;
            text-align: center;
        }

        #deletebtn {
            background-color: rgb(29, 174, 255);
            color: black;
            width: 100px;
            height: 40px;
            border-radius: 5px;
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <div class="check-box">
        <form method="post">
            <h3>Masukkan Username</h3>
            <div class="body">
                <input type="text" name="username" id="username" placeholder="Masukkan Username">
                <div class="menubtn">
                    <a href="admin.php">Kembali</a>
                    <button type="submit" id="deletebtn">Delete</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php
session_start();

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "praktikum7";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['username'])) {
    $username = $_POST['username'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $deleteQuery = "DELETE FROM mahasiswa WHERE username = '$username'";
        if ($conn->query($deleteQuery) === TRUE) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        } else {
            echo "<script>alert('Username tidak ditemukan');</script>";
        }

        header("Location: admin.php"); 
    }
}
?>
