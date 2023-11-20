<?php
if (isset($_POST['submit'])){
    $Nama=$_POST['Nama'];
    $Umur=$_POST['Umur'];
    $Email=$_POST['Email'];
    $TTL=$_POST['TTL'];
    $JK=$_POST['JK'];
    if(isset($_POST['Bahasa'])){
    $Bahasa=[$_POST['Bahasa']];
    }else{
        $Bahasa=null;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No2</title>
</head>
<body>
    <form method='post'  >
    <label for="Nama">Nama Lengkap</label><br>
    <input type="text" id="Nama" name="Nama" required><br>
    <label for="Umur">Umur</label><br>
    <input type="number" id="Umur" name="Umur" required min="0" max="100"><br>
    <label for="Email">Email</label><br>
    <input type="email" id="Email" name="Email" required><br>
    <label for="TTL">Tanggal Lahir</label><br>
    <input type="date"  id="TTL" name="TTL" required><br>
    <label for="JK">Jenis Kelamin</label><br>
    <input type="radio" id="JK" value="Laki-Laki" name="JK" required>
    <label for="JK">Laki-Laki</label><br>
    <input type="radio" id="JK" value="Perempuan" name="JK" required>
    <label for="JK">Perempuan</label><br>
    <label for="Bahasa[]">Bahasa Yang Dikuasai</label><br>
    <label for="Bahasa[]">Java</label>
    <input type="checkbox" id="Bahasa" value="Java" name="Bahasa[]" > <br>
    <label for="Bahasa[]">Python</label>
    <input type="checkbox" id="Bahasa" value="Python" name="Bahasa[]" > <br>
    <label for="Bahasa[]">HTML</label>
    <input type="checkbox" id="Bahasa" value="HTML" name="Bahasa[]" > <br>
    <label for="Bahasa[]">CSS</label>
    <input type="checkbox" id="Bahasa" value="CSS" name="Bahasa[]" > <br>
    <label for="Bahasa[]">JavaScript</label>
    <input type="checkbox" id="Bahasa" value="JavaScript"name="Bahasa[]" > <br>
    <label for="Bahasa[]">PHP</label>
    <input type="checkbox" id="Bahasa" value="PHP"name="Bahasa[]" > <br>
    <input type="submit" value="submit" name="submit" >
    </form>
    <div>

    </div>

</body>
<script>
    document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault(); });
 
    var divs=document.querySelector("div")
    
    function bahasaentry(bahasas){
    if(bahasas){
            bahasa.textContent="Aku bisa menggunakan bahasa : "
            divs.appendChild(bahasa)
            for (const langu of bahasas){
                var bahasaElement = document.createElement('p');
                bahasaElement.textContent = langu;
                divs.appendChild(bahasaElement);
            }
        }
        else{
            bahasa.textContent="aku belum menguasai bahasa pemograman apapun"
            divs.appenChild(bahasa)
        }
    }

    var Name=('<?=($Nama);?>')
    var Usia=('<?=($Umur);?>')
    var Emails=('<?=($Email);?>')
    var TTLR=('<?=($TTL);?>')
    var JKN=('<?=($JK);?>')
    try{
    var Bahasas=JSON.parse('<?=json_encode($Bahasa);?>')
    }catch{
        var Bahasas=null
    }
    var nama=document.createElement('p');
    var umur=document.createElement('p');
    var email=document.createElement('p');
    var ttl=document.createElement('p');
    var jk=document.createElement('p');
    var lbahasa=document.createElement('p');
    var bahasa=document.createElement('p');

    nama.textContent="Hai,namaku "+Name
    umur.textContent="Aku berumur "+Usia+" Tahun"
    email.textContent="Emailku "+Emails
    ttl.textContent="Aku dilahirkan pada "+TTLR
    jk.textContent="Aku adalah seorang "+JKN
    if (Bahasas==null){
        bahasa.textContent="Aku tidak bisa menggunakan bahasa apapun"
    }
    else{
        bahasa.textContent="Aku bisa menggunakan bahasa "+Bahasas
    }

    divs.appendChild(nama)
    divs.appendChild(umur)
    divs.appendChild(email)
    divs.appendChild(ttl)
    divs.appendChild(jk)
    divs.appendChild(bahasa)
  



</script>
</html>
