<?php
session_start();
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
            width: 800px;
            border: 1px solid;
            border-radius: 10px;
            padding: 20px 80px 30px;
        }

        .profil-box .data {
            display: flex;
            width: 600px;
            height: 40px;
            border: 1px solid;
            border-radius: 10px;
            margin: 15px
        }

        .profil-box .data h5 {
            margin: 0;
            padding-left: 20px;
            display: flex;
            align-items: center;
        }

        #logoutbtn {
            background-color: RGB(255, 9, 83);
            color: black;
            width: 100px;
            height: 40px;
            border-radius: 5px;
            margin-top: 20px;
        }
        
    </style>

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <div class="profil-box">
        <div class="head-profil">
            <h3>Profil Mahasiswa</h3>
        </div>
        <div class="body-profil">
            <div class="data">
                <h5 id="username">Username:
                    <?php echo $_SESSION['username']; ?>
                </h5>
            </div>

            <div class="data">
                <h5 id="fullname">Nama Lengkap:
                    <?php echo $_SESSION['fullname']; ?>
                </h5>
            </div>

            <div class="data">
                <h5 id="nim">NIM:
                    <?php echo $_SESSION['nim']; ?>
                </h5>
            </div>

            <div class="data">
                <h5 id="prodi">Prodi:
                    <?php echo $_SESSION['prodi']; ?>
                </h5>
            </div>
        </div>
        <form action="index.php">
            <button type="submit" name="logout" id="logoutbtn">Logout</button>
        </form>
    </div>

</body>

</html>