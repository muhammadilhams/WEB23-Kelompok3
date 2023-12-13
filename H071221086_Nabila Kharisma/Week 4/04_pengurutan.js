let numbers = [] //[] itu array 
const n = parseInt(prompt("Masukkan nilai n : ")) //const tidak bs di ubah 
for (let i = 0; i < n; i++) {
    let number = parseInt(prompt(`Masukkan angka ke ${i} :`)) //ini untuk inputan 
    numbers.push(number); //number itu per angka nya , numbers perkumpulan angka2 nya, push itu untuk simpan ki yang angka satu2 
}

const panjang = numbers.length //variabel panjg itu sm dengan numbers.lenght 
let tukar; //variabel tukar 

do {
    tukar= false; //pertama itu tukar itu false 
    for (let i = 0; i < panjang-1 ; i++) {// untuk mengatur berapa kali dia ditukar, misalnya dia pjg 5 dia ditukar cmn 4 kli mknya kurang 1
        if (numbers[i]>numbers[i+1]) {//untuk menukar angka yang lebih kecil dengan yang besar, untuk di urtkan
        let balik = numbers[i] //let balik itu untuk menyimpan sementara nilai indeks pada elemen i sebelemu di tukar 
        numbers[i] = numbers[i+1] //kalau berhasil ki yg if (numbers[i]>numbers[i+1]) 
        numbers[i+1] = balik 
        tukar = true //ketika true, maka penukaran diulang terus sampai batasannya
        }
    }
} while (tukar); //biar berjalan terus perulangannya, karena tukar bernilai true

console.log(numbers.join(', '));//ubah array jadi string dengan pemisah koma misal 1,2,3 pake komai tlo gblk 
