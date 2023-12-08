//no2
// const kata = prompt("Masukkan Kata : ");
// const n = parseInt(prompt("Masukkan angka : "));
// const hurufAZ = "abcdefghijklmnopqrstuvwxyz"; //string yg berisi alfabet kecil dipke utk mendeteksi karakter yg akan digeser

// let hasil = ""; //string ksg utk simpan nanti hasil karakter yg sdh digeser

// for (let i = 0; i < kata.length; i++) { //perulangan dari setiap karakter yg ada pada kata 
//     let karakter = kata[i]; //karakter= (huruf) yg dipisah dari kata

//     if (/[a-zA-Z]/.test(karakter)) { //utk mengetest setiap karakter itu huruf kecil/besar 
//         let hurufIndeks = hurufAZ.indexOf(karakter.toLowerCase()); //variabel yg menampung huruf per indeks
//         if (hurufIndeks > -1) { //hitungan indeksnya dari depan (a)
//             let geserIndeks = (hurufIndeks + n) % 26; // spy pergeseran setiap indeks itu ttp berada di 0-26
//             if (geserIndeks < 0) {
//                 geserIndeks += 26;
//             }
//             let hurufGeser = hurufAZ[geserIndeks]; //huruf yg sdh digeser trs diambil dari hurufAZ
//             if (karakter === karakter.toUpperCase()) { 
//                 hurufGeser = hurufGeser.toUpperCase(); 
//             } else if (karakter === karakter.toLowerCase()) { 
//                 hurufGeser = hurufGeser.toLowerCase(); 
//             }
//             karakter = hurufGeser; 
//         }
//     }
//     hasil += karakter;
// }
// alert(hasil);