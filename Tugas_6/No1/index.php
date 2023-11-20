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
    <title>No 1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="input">
        <select name="input" id="input">
            <option value=""></option>
            <option value="Elektronik">Elektronik</option>
            <option value="Buah">Buah</option>
            <option value="Pakaian">Pakaian</option>
        </select>
        <button id="btn" type="button" onclick="lain()">Cari</button>

    </div>
    <div class="data">
        <table>
            <tr>
                <th>Name</th>
                <th>Stock</th>
                <th>Price</th>
            </tr>
        </table>
    </div>


    <script type=text/javascript>
    var body=document.querySelector("body")
    var table=document.querySelector('table')
    function lain(){
    let Del=document.querySelectorAll('.newTable')
    try{
        for(let i=0;i<Del.length;i++){
            Del[i].remove()
        }
        
    }catch{
        console.log("Elemen Lama Telah Dihapus")
    }
    let input=document.getElementById('input')
    let val=input.value
    if (val=="Elektronik"||val=="elektronik"){
         var data1=JSON.parse('<?=json_encode($data[0]);?>')
         var data2=JSON.parse('<?=json_encode($data[5]);?>')
         var data3=JSON.parse('<?=json_encode($data[8]);?>')
         prints(data1)
         prints(data2)
         prints(data3)      
    }else if(val=="Buah"||val=='buah'){
        var data1=JSON.parse('<?=json_encode($data[1]);?>')
        var data2=JSON.parse('<?=json_encode($data[3]);?>')
        var data3=JSON.parse('<?=json_encode($data[6]);?>')
        prints(data1)
        prints(data2)
        prints(data3)  
    }else if(val=="Pakaian"||val=='pakaian'){
        var data1=JSON.parse('<?=json_encode($data[2]);?>')
        var data2=JSON.parse('<?=json_encode($data[4]);?>')
        var data3=JSON.parse('<?=json_encode($data[7]);?>')
        prints(data1)
        prints(data2)
        prints(data3)  
    }else{
        alert("gagal")
    }    
}

function prints(data){
    delete data.jenis
    let tr=document.createElement('tr');
    for (const datas in data){
        let td=document.createElement('td')
            td.innerText=data[datas]
            tr.appendChild(td)
    }
    tr.setAttribute('class','newTable')
    table.appendChild(tr)

}



    </script>
</body>
</html>