// cari angka terkecil di array
function angkaterkecil(arr) {
    let indeksterkecil = 0;
    for (let i = 1; i < arr.length; i++) {
        if (arr[i] < arr[indeksterkecil]) {
            indeksterkecil = i;
        }
    }
    return indeksterkecil;
}

//urutkan dari yang terkecil
function selectionSort(arr) {
    const sortedArray = [];
    const n = arr.length;
    for (let i = 0; i < n; i++) {
        const indeksterkecil = angkaterkecil(arr);
        sortedArray.push(arr.splice(indeksterkecil, 1)[0]);
    }
    return sortedArray;
}

const n = parseInt(prompt("Masukkan jumlah angka: "));
const numbers = [];

for (let i = 0; i < n; i++) {
    const number = parseInt(prompt(`Masukkan angka ke-${i + 1}: `));
    numbers.push(number);
}

const sortedNumbers = selectionSort(numbers);

console.log("Angka yang diurutkan:");
alert(sortedNumbers.join(" "));
