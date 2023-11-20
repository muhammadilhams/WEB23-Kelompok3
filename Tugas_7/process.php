<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
</head>
<body>

<h1>Data Pengguna</h1>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Prodi</th>
        </tr>

<?php
session_start(); // Memulai sesi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nama = $_POST["Nama"];
    $NIM = $_POST["NIM"];
    $Prodi = $_POST["Prodi"];
    $apass = $_POST["apass"]; // Periksa apakah apass kosong

    if ($apass === "") { // Periksa apakah apass kosong dengan benar
        admin($Nama, $NIM, $apass);
    } else {
        user($Nama, $NIM, $Prodi);
    }
}

function user($Nama, $NIM) {
    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "study-case";

    $conn = new mysqli($server, $db_username, $db_password, $db_name);
    
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Perbaiki query untuk menghindari SQL injection
    $sql = "SELECT Nama, NIM, Prodi FROM tugas7 WHERE NIM='$NIM'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($NIM == $row["NIM"]) {
            $_SESSION["Nama"] = $Nama;
            echo "Selamat Datang " . $row["Nama"] . "<br><br><br>";
            showUser();
        } else {
            echo "Tidak ada NIM yang cocok" . "<br>";
        }
    } else {
        echo "Tidak ada user yang cocok";
    }
    $conn->close();
}

function admin($Nama, $NIM, $apass) {
    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "study-case";

    $conn = new mysqli($server, $db_username, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    
    // Perbaiki query untuk menghindari SQL injection
    $stmt = $conn->prepare("SELECT Nama, NIM, IsAdmin FROM tugas7 WHERE NIM=?");
    $stmt->bind_param("s", $NIM);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $passwordHash = $row["IsAdmin"];
        // Periksa password admin dengan cara yang sesuai
        if ($apass === $passwordHash) { 
            $_SESSION["Nama"] = $Nama;
            echo "Selamat datang Admin " . $row["Nama"] . "<br><br>";
        } else {
            echo "Password Salah Admin";
        }
    } else {
        echo "Tidak ada user yang cocok";
    }
    
    $stmt->close();
    $conn->close();
}

function showUser() {
    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "study-case";
    $conn = new mysqli($server, $db_username, $db_password, $db_name);

    $sql = "SELECT Nama, NIM, Prodi FROM tugas7";
    $result = $conn->query($sql);
    
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            echo "Nama: " . $row["Nama"] . ", NIM: " . $row["NIM"] . ", Prodi: " . $row["Prodi"] . "<br>";
        }
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $Nama = $_POST["Nama"];
//     $NIM = $_POST["NIM"];
//     $Prodi = $_POST["Prodi"];
//     if ($_POST["apass"]="") {
//         $apass=$_POST["apass"];
//         admin($Nama,$NIM,$apass);
//     }else {
//         user($Nama,$NIM,$Prodi);
//     }
// }
// function user($Nama,$NIM ){
//     $server = "localhost";
//     $db_username = "root";
//     $db_password = "";
//     $db_name = "study-case";
    
//     $conn = new mysqli($server, $db_username, $db_password,
//     $db_name);
//      if ($conn->connect_error) {
//         die("Koneksi gagal: " . $conn->connect_error);
//         }
    
//         $sql = "SELECT Nama, NIM FROM tugas7 where NIM=$NIM";
//         $result = $conn->query($sql);
//         if ($result->num_rows == 1) {
//             $row = $result->fetch_assoc();
//             if (($NIM== $row["NIM"])) {
//                 $_SESSION["Nama"] = $Nama;
//                 echo "Selamat Datang ". $row["Nama"]."<br>"."<br> <br>";
//                 showUser();
//                 }
//             else{
//                 echo "Tidak ada NIM yang cocok"."<br>";
//             }
//             } 
//         else{
//             echo "Tidak ada user yang cocok ";
//             }
//     }

// function admin($Nama,$NIM,$apass){
//     $server = "localhost";
//     $db_username = "root";
//     $db_password = "";
//     $db_name = "study-case";

//     $conn = new mysqli($server, $db_username, $db_password,
//     $db_name);
//     if ($conn->connect_error) {
//         die("Koneksi gagal: " . $conn->connect_error);
//     }
//     $sql = "SELECT Nama, NIM,IsAdmin FROM tugas7 where NIM=?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("s", $NIM);
//     $stmt->execute();
//     $result = $stmt->get_result();
    
//     if ($result->num_rows > 0) {
//         $row=$result->fetch_assoc();
//         $passwordHash=$row["IsAdmin"];
//         if  (password_verify($apass,$passwordHash)){
//             $_SESSION["Nama"]=$Nama;
//             echo "Selamat datang Admin".$row["Nama"]."<br><br>";
//             }
//             else{
//                 echo "Password Salah Admin";
//             }
        
//         } 
//     else{
//         echo "Tidak ada user yang cocok";
//         }
//         $stmt->close();
//         $conn->close();
// }



// function showUser(){
//     $server = "localhost";
//     $db_username = "root";
//     $db_password = "";
//     $db_name = "study-case";
//     $conn = new mysqli($server, $db_username, $db_password,
//     $db_name);

//     $sql="Select * From tugas7";
//     $result=$conn->query($sql);
//     while($row=$result->fetch_assoc()){
//         ?>
//         <tr>
//             <td><?php echo $row["Nama"]; ?></td>
//             <td><?php echo $row["NIM"]; ?></td>
//             <td><?php echo $row["Prodi"]; ?></td>
//         </tr>
//         <?php
//     }

// }
    
?>

</body>
</html>

