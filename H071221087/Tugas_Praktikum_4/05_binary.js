function convertToBinary() {
    const input = parseInt(prompt("Masukkan angka yang akan diubah ke binary "));
    if (!isNaN(input)) {
        let binary = "";

        if (input > 0) {
            let angka = input;
            while (angka > 0) {
                binary = (angka % 2) + binary;
                angka = Math.floor(angka / 2);
            }
            alert("Angka " + input + " dalam bentuk biner adalah " + binary);
        } else if (input == 0) {
            binary = "0";
            alert("Angka " + input + " dalam bentuk biner adalah " + binary);
        } else {
            alert("Inputan harus berupa angka positif");
        }
    } else {
        alert("Inputan harus berupa angka positif");
    }
}
convertToBinary();