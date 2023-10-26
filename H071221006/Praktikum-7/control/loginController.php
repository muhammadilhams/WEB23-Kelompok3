<?php

include("./config/connection.php");

class LoginController extends Connection
{
    public function __construct($data)
    {
        parent::__construct(); //panggil parent konstruktor di connection supaya terhubung

        $username = $data['username'];
        $password = $data['password'];

        $query = "SELECT * FROM users WHERE username = ? AND password = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // $result = mysqli_query($this->connect, $query);
        // if (mysqli_num_rows($result) > 0) {
        //     while ($data = mysqli_fetch_assoc($result)) {
          if ($result->num_rows > 0) {
                while ($data = $result->fetch_assoc()) {
                session_start();
                $_SESSION['id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['nama'] = $data['nama'];
                $_SESSION['prodi'] = $data['prodi'];
                $_SESSION['status'] = 'login';

                if ($data['role'] == 'admin') {
                    header("Location: page/admin.php?message=Selamat datang admin");
                } else {
                    header("Location: page/index.php?message=Selamat datang");
                }
            }
            return;
        } else {
            header("Location: ?message=Password salah!");
            return;
        }
    }
}
