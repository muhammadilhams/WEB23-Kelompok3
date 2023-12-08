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