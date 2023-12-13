let kata = prompt("Masukkan Kata : ");   
let n = parseInt(prompt("Masukkan angka : "));  //parse int karena angka 
const hurufAZ = "abcdefghijklmnopqrstuvwxyz";  //ini ketentuan yang kt masukkan 

let hasil = ""; //string kosong 

for (let i = 0; i < kata.length; i++) {  
    let karakter = kata[i]; //karakter itu kata2 yang bs dipisah2 secara satu 

    if (/[a-zA-Z]/.test(karakter)) { //a-zA-Z ini untuk bisa ki huruf kecil sm huruf besar. test itu untuk untuk di test ki untuk kata nya itu di cek 
        let hurufIndeks = hurufAZ.indexOf(karakter.toLowerCase());  //variabel baru untuk menampung huruf per indeks, indexOf(karakter.toLowerCas itu untuk indeks dari karakter diksi lower case 
        if (hurufIndeks !== -1) { //artinya hitungnnya itu dari depan jdi nd bs dari z 
            let geserIndeks = (hurufIndeks + n) % 26; //geser itu untuk huruf yg sudami bergeser + dgn n jumlah nya yg mau digeser, % 26 untuk kayak misalkanya s bru n nya itu 20 diulang lgi dari a 
            if (geserIndeks < 0) {
                geserIndeks += 26; 
            }
            let hurufGeser = hurufAZ[geserIndeks];

            if (karakter === karakter.toUpperCase()) {
                hurufGeser = hurufGeser.toUpperCase();
            }

            karakter = hurufGeser;
        }
    }

    hasil += karakter;
}
console.log(hasil);
