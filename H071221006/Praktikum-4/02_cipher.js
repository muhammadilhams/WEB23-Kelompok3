let kata = prompt("Masukkan kata : ");
let n = parseInt(prompt("Masukkan n : "));
let kata2 = "abcdefghijklmnopqrstuvwxyz";

let isCapital = false;  //menandai apakah kata yang dimasukkan oleh pengguna dimulai dengan huruf kapital atau tidak
let hasil = "";   //untuk menyimpan hasil enkripsi.

// untuk mengiterasi melalui setiap karakter dalam kata yang dimasukkan oleh pengguna.
for (let i = 0; i < kata.length; i++) {
  let karakter = kata[i];
  let isUpperCase = false;

  if (karakter === karakter.toUpperCase()) {
    isUpperCase = true;
    karakter = karakter.toLowerCase();
  }

//   memeriksa apakah karakter saat ini adalah huruf kecil dan termasuk dalam kata2
  if (kata2.includes(karakter)) {
    let index = kata2.indexOf(karakter);
    index = (index + n) % kata2.length;
    let hasilKarakter = kata2[index];

    if (isUpperCase) {
      hasilKarakter = hasilKarakter.toUpperCase();
    }
    hasil += hasilKarakter;
  } else {
    // Karakter selain huruf kecil tidak dienkripsi
    hasil += karakter;
  }
}

alert(hasil);
