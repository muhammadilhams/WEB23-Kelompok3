let angka = parseInt(prompt('Masukkan angka = '))  //let itu  bisa diubah , //perseint itu mau diubah ke int 
let pangkat = parseInt(prompt('Masukkan pangkat = '))

// let hasil = 1 //variabel untuk menampung hasilnya nanti, jadi apapun hasilnya akan tetap angka itu sendiri karena dikali 1

// for (let index = 0; index < pangkat; index++) {//index dimulai dari nol itu untuk perulangan, index<pangkat untuk batasan perulangan pangkatnya, jadi klo 4 kai berarti empat kali dikalikan, index++ bertambah teruski indexnnya
//     hasil *= angka; //supaya berkali-kali sesuai dengan batasa pangkatnya
// }

// console.log(hasil);

let hasil = angka**pangkat
console.log(hasil);