<?php
$data = [
    [
        "nama_barang" => "HP",
        "harga" => 3000000,
        "stok" => 10,
        "jenis" => "Elektronik"
    ],
    [
        "nama_barang" => "Jeruk",
        "harga" => 5000,
        "stok" => 20,
        "jenis" => "Buah"
    ],
    [
        "nama_barang" => "Kemeja",
        "harga" => 5000,
        "stok" => 9,
        "jenis" => "Pakaian"
    ],
    [
        "nama_barang" => "Apel",
        "harga" => 5000,
        "stok" => 5,
        "jenis" => "Buah"
    ],
    [
        "nama_barang" => "Celana",
        "harga" => 5000,
        "stok" => 10,
        "jenis" => "Pakaian"
    ],
    [
        "nama_barang" => "Laptop",
        "harga" => 50000,
        "stok" => 30,
        "jenis" => "Elektronik"
    ],
    [
        "nama_barang" => "Semangka",
        "harga" => 5000,
        "stok" => 2,
        "jenis" => "Buah"
    ],
    [
        "nama_barang" => "Kaos",
        "harga" => 5000,
        "stok" => 1,
        "jenis" => "Pakaian"
    ],
    [
        "nama_barang" => "VGA",
        "harga" => 2000000,
        "stok" => 0,
        "jenis" => "Elektronik"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomor1</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["tipe"])) {
            $jenis = $_POST["tipe"];
            $dataFiltered = array_filter($data, function ($item) use ($jenis) {
                return $item['jenis'] == $jenis;
            });
        }
    }
    ?>

    <form method="POST" action="input.php">
        <input type="text" placeholder="Masukkan jenis barang..." name="tipe" required>
        <button type="submit">Submit</button>
    </form>
    <br>

    <?php
    if (isset($dataFiltered)) {
        echo "<h2>Daftar Barang $jenis</h2>";
        echo "<a href=\"input.php\">Kembali</a>";
        echo "<br>";
        echo "<br>";
    }
    ?>

    <table border="2">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Stok</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($dataFiltered)) {
                foreach ($dataFiltered as $item) {
                    echo "<tr>";
                    echo "<td>" . $item["nama_barang"] . "</td>";
                    echo "<td>" . $item["stok"] . "</td>";
                    echo "<td>" . $item["harga"] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html>
