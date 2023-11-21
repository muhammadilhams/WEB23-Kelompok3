function bblsort(arr) {
    let len = arr.length;
    for (let i = 0; i < len - 1; i++) {
        for (let j = 0; j < len - 1 - i; j++) {
            if (arr[j] > arr[j + 1]) {
                let temp = arr[j];
                arr[j] = arr[j + 1];
                arr[j + 1] = temp;
            }
        }
    }
}

let myArray = [];

let banyakBilangan = prompt("Masukkan banyak bilangan ");

if (!isNaN(banyakBilangan) && parseInt(banyakBilangan) > 0) {
    let input = prompt("Berikan " + banyakBilangan + " bilangan ");
    input = input.trim();

    let bilangan = input.split(" ");

    if (bilangan.length === parseInt(banyakBilangan)) {
        for (let i = 0; i < bilangan.length; i++) {
            myArray.push(parseInt(bilangan[i]));
        }

        bblsort(myArray);

        alert("Bilangan yang telah diurutkan dari terkecil ke terbesar: " + myArray.join(" "));
    } else {
        alert("Jumlah bilangan yang dimasukkan tidak sesuai dengan yang diminta.");
    }
} else {
    alert("Inputan harus berupa angka dan positif");
}