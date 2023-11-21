function cipherText(input, n) {
    const abjadKecil = "abcdefghijklmnopqrstuvwxyz".split("");
    const abjadKapital = "ABCDEFGHIJKLMNOPQRSTUVWXYZ".split("");

    let hasil = "";

    for (let i = 0; i < input.length; i++) {
        if (/[a-zA-Z]/.test(input[i])) {
            let abjad;
            if (/[a-z]/.test(input[i])) {
                abjad = abjadKecil;
            } else {
                abjad = abjadKapital;
            }

            const indeks = abjad.indexOf(input[i]);

            const indeksBaru = (indeks + n) % 26;

            hasil += abjad[indeksBaru];
        } else {
            alert("Terdapat inputan selain huruf");
            break;
        }
    }
    return hasil;
}

let jumlahGeser = parseInt(prompt("Digeser sebanyak ... kali"));
if (jumlahGeser >= 0) {
    let text = prompt("Masukkan Text");
    if (/^[a-zA-Z]+$/.test(text)) {
        let hasil = cipherText(text, jumlahGeser);
        alert(hasil);
    } else {
        alert("Inputan hanya terdiri dari huruf");
    }
} else {
    alert("Inputan harus berupa angka positif");
}