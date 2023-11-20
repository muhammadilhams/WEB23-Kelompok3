<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
          *{
        margin: 0;
        padding: 2;
        box-sizing: border-box;
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
        <div class="container p-1">
            <div class="row">
                <div class="col-6">
                <input type="hidden" name="tambah">
                <button class="btn btn-secondary w-100" type="submit">Daftar</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>