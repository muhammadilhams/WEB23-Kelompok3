const base10 = parseInt(prompt("Masukkan angka: "));

// Mengonversi angka desimal ke biner
const binaryNumber = base10.toString(2);

// Menampilkan hasil konversi
alert(`Angka desimal ${base10} dalam bentuk biner adalah ${binaryNumber}`);