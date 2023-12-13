<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-5">
        <h2 class="text-center">M A S U K</h2>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="registration.php" method="post">
                    <div class="form-group">
                        <label for="nama">Username:</label>
                        <input type="text" name="fullname" class="form-control" id="nama" placeholder="Masukkan Username Anda" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" name="password" class="form-control" id="password" placeholder="Masukkan Password Anda" required>
                    </div>

                    <div class="menubtn">
                        <a href="index.php" class="mr-2">Kembali</a>
                        <input id="submit" type="submit" value="Masuk" name="register" class="btn btn-primary"></input>
                    </div>

                    <div class="register">
                        <p>Belum punya akun? <a href="/registration">Daftar disini!</a></p>
                    </div>
                    <div class="notes"></div>
                </form>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
