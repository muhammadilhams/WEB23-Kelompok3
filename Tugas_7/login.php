<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background-color:wheat ;
            padding: 0 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .main{
            margin-top: 30vh;
            width: 720px;
            border-radius: 5px;
            padding: 10px 10px;
        }
        .main h1{
            position: relative;
            left: 50%;
            transform: translateX(-25%);
        }
    </style>
    </head>
<body>
    <form action="proses.php" method="post">
    <div class="main">
        <h1 class="display-1 ">Login Page</h1>

        <div class="mb-3">
        <label for="Nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="Nama" name="Nama" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3">
        <label for="NIM" class="form-label">NIM</label>
        <input type="text" class="form-control" id="NIM" name="NIM" required>
    </div>
    <div class="mb-3">
        <label for="Prodi" class="form-label">Prodi</label>
        <input type="text" class="form-control" id="Prodi" name="Prodi" required>
    </div>
    <div class="mb-3">
        <label for="apass" class="form-label">Admin Password</label>
        <input type="password" class="form-control" id="apass" name="apass" placeholder="Kosongkan jika anda bukan Admin">
    </div>
        <div class="container p-1">
            <div class="row">
                <div class="col-6">
                <button class="btn btn-primary w-100" type="submit">Login</button>
                </div>
                <div class="col-6">
                <a class="btn btn-secondary" href="regist.php" style="display: block;">Registrasi</a>
                </div>
            </div>
        </div>
    </div>
    </form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>