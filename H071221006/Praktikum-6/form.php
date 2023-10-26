<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Nama Lengkap: <input type="text" name="nama"><br>
  Usia: <input type="number" name="usia"><br>
  Email: <input type="email" name="email"><br>
  Tanggal Lahir: <input type="date" name="tgl_lahir"><br>
  Jenis Kelamin:
  <input type="radio" name="jenis_kelamin" value="Laki-laki">Laki-laki
  <input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan<br>
  Bahasa yang dikuasai:
  <input type="checkbox" name="bahasa[]" value="Java">Java
  <input type="checkbox" name="bahasa[]" value="Python">Python
  <input type="checkbox" name="bahasa[]" value="HTML">HTML
  <input type="checkbox" name="bahasa[]" value="CSS">CSS
  <input type="checkbox" name="bahasa[]" value="JavaScript">JavaScript
  <input type="checkbox" name="bahasa[]" value="PHP">PHP<br>
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $usia = $_POST["usia"];
    $email = $_POST["email"];
    $tgl_lahir = $_POST["tgl_lahir"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $bahasa = isset($_POST["bahasa"]) ? $_POST["bahasa"] : [];

    $kalimat_perkenalan = "Halo! Perkenalkan, nama saya " . $nama . ", saya berumur " . $usia . " tahun. Saya lahir pada tanggal " . $tgl_lahir . ". Saya berjenis kelamin " . $jenis_kelamin;

    if (empty($bahasa)) {
        $kalimat_perkenalan .= " dan saya belum menguasai bahasa pemrograman apapun.";
    } else {
        $kalimat_perkenalan .= " dan saat ini saya berhasil menguasai bahasa Pemrograman ";
        $kalimat_perkenalan .= implode(", ", $bahasa);
    }

    echo  $kalimat_perkenalan;
}
?>
