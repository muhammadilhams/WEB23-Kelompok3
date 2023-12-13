//no1
// let angka = parseInt(prompt('Masukkan angka = '))  
// let pangkat = parseInt(prompt('Masukkan pangkat = '))

// let hasil = angka ** pangkat //tempat hasilnya nanti, terus setiap hasil akan dikali 1 spy hasilnya ttp angka itu sendiri

// // for (let index = 0; index < pangkat; index++) { //index dimulai dari 0 utk perulangan trs diberi batasan perulangan pangkatnya, index++ spy bs bertambah trs indexnya
// //     hasil *= angka; //hasil akan dikalikan berkali" dgn "angka" yg dipangkatkan trs hasilnya->"hasil" , utk mempersingkat sintaks
// //                     // hasil = 2
// //                     // hasil = hasil * angka
// // }
// alert(hasil); //"hasil" akan dicetak di konsol

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

//no3
// const numberStr = prompt("Masukkan Text : ")
// const NumArray = numberStr.split(''); //text numberStr diubah menjadi array split(dipisah")

// if (NumArray.length == 1) {
//     console.log(`${numberStr} adalah Text Palindrome`);
// } else {
//     const reversedNumArray = NumArray.reverse(); //setiap text akan direserve utk ditau palindrome/bukan
//     const reversedNumberStr = reversedNumArray.join(''); //spy textnya digabung / tidak terpisah

//     if (numberStr === reversedNumberStr) {
//         console.log(`${numberStr} adalah Text Palindrome`);
//     } else {
//         console.log(`${numberStr} bukan Text Palindrome`);
//     }
// }

//no4
// let numbers = [] 
// const n = parseInt(prompt("Masukkan nilai n : ")) 
// for (let i = 0; i < n; i++) { //perulangan yg berjalan sebanyak n kali 
//     let number = parseInt(prompt(`Masukkan angka ke ${i} :`))
//     numbers.push(number);
// }

// const panjang = numbers.length //panjang angka(n) yg dimasukkan
// let tukar;

// do {
//     tukar= false;
//     for (let i = 0; i < panjang-1 ; i++) { //perulangan utk berapa kali akan ditukar tp -1
//         if (numbers[i]>numbers[i+1]) { //untuk yg lbh kecil/besar lalu diurutkan
//         let balik = numbers[i]  // dibalik kalau if nya terjadi
//         numbers[i] = numbers[i+1]
//         numbers[i+1] = balik
//         tukar = true 
//         }
//     }
// } while (tukar); //spy berjln trs tukar kalau true

// console.log(numbers.join(', '));

//no5
// let angka = parseInt(prompt("Masukkan Angka : "))

// if (angka === 0) {
//     console.log(`dalam bentuk binary adalah 0`);
// }else {
//     let binary = ''
//     while (angka>0){
//         let sisa = angka%2
//         binary = sisa+binary
//         angka = Math.floor(angka/2)
//     }
//     console.log(`dalam bentuk binary adalah ${binary}`);
// }