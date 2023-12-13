<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .update-box {
            width: 450px;
            border: 1px solid;
            border-radius: 10px;
            padding: 20px 70px 30px;
            margin: 0 auto;
            margin-top: 125px;
        }

        .update-box h3 {
            margin-bottom: 20px;
        }

        .update-body {
            display: flex;
            flex-direction: column;    
            align-items: center;
            align-content: center;     
        }

        .update-body input{
            height: 40px;
            text-align: center;
            margin-bottom: 10px;
        }

        #updatebtn {
            background-color: rgb(29, 174, 255);
            color: black;
            width: 100px;
            height: 40px;
            border-radius: 5px;
        }

        .menubtn {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="update-box">
        <h3>Update Data Mahasiswa</h3>
        <div class="update-body">
            <form method="post">
                <div class="editFullname">
                    <input type="text" name="fullname" id="fullname" placeholder="Nama Lengkap" required>
                </div>
                <div class="editNIM">
                    <input type="text" name="nim" id="nim" placeholder="NIM" required>
                </div>
                <div class="editProdi">
                    <input type="text" name="prodi" id="prodi" placeholder="Prodi" required>
                </div>
                <div class="editPassword">
                    <input type="text" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="menubtn">
                    <button type="submit" id="updatebtn">Update</button>
                </div>
            </form>
        </div>
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

if (!isset($_SESSION['username'])) {
    header("Location: check-username.php"); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username'];
    $fullname = $_POST["fullname"];
    $nim = $_POST["nim"];
    $prodi = $_POST["prodi"];
    $password = $_POST["password"];

    $updateQuery = "UPDATE mahasiswa SET fullname = '$fullname', nim = '$nim', prodi = '$prodi', password = '$password' WHERE username = '$username'";

    if ($conn->query($updateQuery) === TRUE) {
        header("Location: admin.php");
} else {
    echo "Error: " . $conn->error;
}


    unset($_SESSION['username']);
}
?>
