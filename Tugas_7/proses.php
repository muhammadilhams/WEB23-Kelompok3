<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Data Pengguna</h1>
    
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["edit"])) {
        $id=$_POST["idE"];
        $Nama = $_POST["Nama"];
        $NIM = $_POST["NIM"];
        $Prodi = $_POST["Prodi"];
        edit($id,$Nama,$NIM,$Prodi);
    }elseif(isset($_POST["tambah"])){
        $Nama = $_POST["Nama"];
        $NIM = $_POST["NIM"];
        $Prodi = $_POST["Prodi"];
        tambah($Nama,$NIM,$Prodi);
    }
    else if (isset($_POST["hapus"])) {
        $id=$_POST["id"];
        echo $_POST["id"];
         hapus($id);
    }else{
        $Nama = $_POST["Nama"];
        $NIM = $_POST["NIM"];
        $Prodi = $_POST["Prodi"];
        if ($_POST["apass"]=="") {
            user($Nama,$NIM,$Prodi);
        }
        else{
            $apass=$_POST["apass"];
            admin($Nama,$NIM,$apass);
        }
    }
}
function user($Nama,$NIM ){
    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "study-case";
    
    $conn = new mysqli($server, $db_username, $db_password,
    $db_name);
     if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
        }
    
        $sql = "SELECT Nama, NIM FROM tugas7 WHERE Nama = ? AND NIM = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $Nama, $NIM);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($Nama == $row["Nama"] && $NIM == $row["NIM"]) {
                echo "Selamat Datang " . $row["Nama"] . "<br><br>";
                showUser();
            } else {
                echo "Tidak ada Nama dan NIM yang cocok" . "<br>";
            }
        } else {
            echo "Tidak ada user yang cocok";
        }
    }

function admin($Nama,$NIM,$apass){
    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "study-case";

    $conn = new mysqli($server, $db_username, $db_password,
    $db_name);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    $sql = "SELECT Nama, NIM,IsAdmin FROM tugas7 where NIM=? and IsAdmin=? and Nama=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $NIM,$apass,$Nama);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row=$result->fetch_assoc();
        if ($Nama == $row["Nama"] && $NIM == $row["NIM"]) {
            if($apass==$row["IsAdmin"]){
            echo "Selamat datang Admin ".$row["Nama"]."<br><br>";
            showAdmin();
            }
            else{
                echo "Password Salah ";
            }
        }else{
            echo "Nama atau NIM salah";
        }
        } 
    else{
        echo "Tidak ada user yang cocok";
        }
        $stmt->close();
        $conn->close();
}

function showAdmin(){
    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "study-case";
    $conn = new mysqli($server, $db_username, $db_password,
    $db_name);

    $sql="SELECT * FROM tugas7";
    $result=$conn->query($sql);?>

    <table class="table">
    <tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Prodi</th>
        <th>Opsi</th>
        <th></th>
    </tr>;
    <?php
    while($row=$result->fetch_assoc()){
        ?>

         <tr>
             <td><?php echo $row["Nama"]; ?></td>
             <td><?php echo $row["NIM"]; ?></td>
             <td><?php echo $row["Prodi"]; ?></td>
             <td>   
                 <button type="button" class="btn btn-warning" onclick="tampilkanPopup(`<?php echo $row['StudentId']; ?>`)">Edit</button>


             <form action="" method="POST">
            <input type="hidden" name="hapus" value="1">
            <input type="hidden" name="id" value="<?php echo $row['StudentId'];?>">
            <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
            </td>        
         </tr>
    <?php }?>
    </table>
    <button class="btn btn-primary mx-2" onclick="tambah()">Tambah Data</button>
    <form action="" method="post" id="popup">
        <div class="popup-content">
            <div class="mb-3">
                <label for="Nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="Nama" name="Nama" aria-describedby="emailHelp" >
            </div>
            <div class="mb-3">
                <label for="NIM" class="form-label">NIM</label>
                <input type="text" class="form-control" id="NIM" name="NIM" >
            </div>
            <div class="mb-3">
                <label for="Prodi" class="form-label">Prodi</label>
                <input type="text" class="form-control" id="Prodi" name="Prodi" >
            </div>
            <div class="mb-3">
                <input type="hidden" name="edit" value="1">
                <input type="hidden" name="idE" id="idE" >
                <button class="btn btn-primary w-100" type="submit" >Edit</button>
            </div>
        </div>
    </form>
    <form action="" method="post" id="popup2">
        <div id="popup-content2" style="display: none;">
            <div class="mb-3">
                <label for="Nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="Nama" name="Nama" aria-describedby="emailHelp" >
            </div>
            <div class="mb-3">
                <label for="NIM" class="form-label">NIM</label>
                <input type="text" class="form-control" id="NIM" name="NIM" >
            </div>
            <div class="mb-3">
                <label for="Prodi" class="form-label">Prodi</label>
                <input type="text" class="form-control" id="Prodi" name="Prodi" >
            </div>
            <div class="mb-3">
                <input type="hidden" name="tambah" value="1">
                <button class="btn btn-primary w-100" type="submit" >Tambah</button>
            </div>
        </div>
    </form>
    <?php
    }
?>   

<?php
function showUser(){
    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "study-case";
    $conn = new mysqli($server, $db_username, $db_password,
    $db_name);

    $sql="Select * From tugas7";
    $result=$conn->query($sql); ?>
    <table class="table">
    <tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Prodi</th>
    </tr>;
    <?php
    while($row=$result->fetch_assoc()){
        ?>
         <tr>
             <td><?php echo $row["Nama"]; ?></td>
             <td><?php echo $row["NIM"]; ?></td>
             <td><?php echo $row["Prodi"]; ?></td>
         </tr>
    <?php }
    }
?>

<?php
function hapus($id){
    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "study-case";
    $conn = new mysqli($server, $db_username, $db_password,
    $db_name);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    $sql = "DELETE FROM tugas7 WHERE studentId=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
  
        echo "Data berhasil dihapus";
    } else {

        echo "Gagal menghapus data: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}

function tambah($Nama,$NIM,$Prodi){
    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "study-case";
    $conn = new mysqli($server, $db_username, $db_password,
    $db_name);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    $sql = "INSERT INTO tugas7 (Nama, NIM,Prodi) values ('$Nama','$NIM','$Prodi')";
    if($conn->query($sql)===TRUE){
       echo "Data berhasil ditambahkan";
    }else{
        echo "Error : ".$sql."<br>" . $conn->error;
    }
    $conn->close();
}
function edit($id,$Nama,$NIM,$Prodi){
    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "study-case";
    $conn = new mysqli($server, $db_username, $db_password,
    $db_name);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    $sql = "UPDATE  tugas7 set Nama=?, NIM=?, Prodi=? WHERE studentId=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $Nama, $NIM, $Prodi, $id);
    if ($stmt->execute()) {
  
        echo "Data berhasil diedit";
    } else {

        echo "Gagal mengedit data: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
    header("Location: proses.php");
exit;
}
?>

<script>
function tampilkanPopup(id) {
    var popup = document.getElementById("popup");
    popup.style.display = "block";
    console.log('halo',id)
    var targetInput = document.getElementById("idE");
    targetInput.value = id;

}
function tambah(){
    
    let popup = document.getElementById("popup2");
    popup.style.display = "block";
    let popupin = document.getElementById("popup-content2");
    popupin.style.display='block'
    console.log(popupin)
}
</script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
