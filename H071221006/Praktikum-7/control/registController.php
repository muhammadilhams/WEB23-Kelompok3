<?php

include("./config/connection.php");

class RegisterController extends Connection
{
    public function __construct($data)
    {
        parent::__construct();

        $nama = $data['nama'];
        $nim = $data['nim'];
        $prodi = $data['prodi'];
        $password = $data['password'];
        $confirmPassword = $data['confirm_password'];

        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        $result = $stmt->get_result();

        // $query = "SELECT * FROM users WHERE username = '$nim'";

        // $result = mysqli_query($this->connect, $query);
        // if (mysqli_num_rows($result) > 0) {
        //     echo "<script>alert('NIM sudah terdaftar!')</script>";
        //     return;
        // }
        if ($result->num_rows > 0) {
            echo "<script>alert('NIM sudah terdaftar!')</script>";
            return;
        }

        $this->connect->select_db(DB_NAME);

        if ($password == $confirmPassword) {
            // $query = "INSERT INTO users VALUES ('', '$nim', '$nama', '$prodi', 'mahasiswa', '$password')";
            // $result = mysqli_query($this->connect, $query);

            // header("Location: index.php?message=Berhasil mendaftar!");
            // return $result;
            $query = "INSERT INTO users (id, username, nama, prodi, role, password) VALUES ('', ?, ?, ?, 'mahasiswa', ?)";
            $stmt = $this->connect->prepare($query);
            $stmt->bind_param("ssss", $nim, $nama, $prodi, $password);

            if ($stmt->execute()) {
                header("Location: login.php?message=Berhasil mendaftar!");
                exit;
            } else {
                echo "<script>alert('Gagal mendaftar!')</script>";
            }
        } else {
            echo "<script>alert('Konfirmasi password tidak sesuai!')</script>";
            return;
        }
    }
}
