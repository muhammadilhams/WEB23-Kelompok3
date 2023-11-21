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

$query = "SELECT username, fullname, nim, prodi, password FROM mahasiswa WHERE username <> 'admin'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            padding-top: 125px;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-content: center;
            justify-content: center;
            align-items: center;
        }

        .profil-box {
            display: flex;
            flex-direction: column;
            align-content: center;
            align-items: center;
            width: auto;
            border: 1px solid;
            border-radius: 10px;
            padding: 20px 80px 30px;
        }

        .profil-box h3 {
            padding-bottom: 20px;
        }

        .profil-box table {
            width: 100%;
            border-collapse: collapse;
        }

        .profil-box th,
        .profil-box td {
            border: 1px solid;
            padding: 8px;
            text-align: left;
        }

        .profil-box th {
            background-color: #f2f2f2;
        }

        .menubutton {
            display: flex;
            flex-direction: row;
            justify-content: space-between
        }

        .crud {
            display: flex;
            flex-direction: row;
        }

        #logoutbtn {
            background-color: RGB(255, 9, 83);
            color: black;
            /* width: 100px; */
            height: 40px;
            border-radius: 5px;
            margin-top: 20px;
        }

        #insertbtn {
            background-color: RGB(28, 255, 31);
            color: black;
            /* width: 130px; */
            height: 40px;
            border-radius: 5px;
            margin-top: 20px;
            margin-right: 10px;
        }

        #editbtn {
            background-color: rgb(29, 174, 255);
            color: black;
            /* width: 130px; */
            height: 40px;
            border-radius: 5px;
            margin-top: 20px;
            margin-right: 10px;
        }

        #deletebtn {
            background-color: RGB(255, 9, 83);
            color: black;
            /* width: 130px; */
            height: 40px;
            border-radius: 5px;
            margin-top: 20px;
        }

    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <div class="profil-box">
        <div class="head-profil">
            <h3>Dashboard</h3>
        </div>

        <div class="body-profil">
            <table>
                <tr>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>NIM</th>
                    <th>Prodi</th>
                    <th>Password</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['fullname'] . "</td>";
                        echo "<td>" . $row['nim'] . "</td>";
                        echo "<td>" . $row['prodi'] . "</td>";
                        echo "<td>". $row['password'] . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>

            <div class="menubutton">
                <div class="logout">
                    <form action="index.php">
                        <button type="submit" name="logout" id="logoutbtn">Logout</button>
                    </form>
                </div>
                <div class="crud">
                    <form action="index.php">
                    </form>
                    <form action="admin-create.php">
                        <button type="submit" name="insert" id="insertbtn">Tambah Data</button>
                    </form>
                    <form action="check-username.php">
                        <button type="submit" name="edit" id="editbtn">Edit Data</button>
                    </form>
                    <form action="admin-delete.php">
                        <button type="submit" name="delete" id="deletebtn">Hapus Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>