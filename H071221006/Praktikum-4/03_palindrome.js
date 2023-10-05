function isPalindrome(word) {
    // hapus spasi dan mengubah huruf menjadi huruf kecil
    const cleanWord = word.toLowerCase().replace(/\s/g, '');    //regular expression (mencocokkan satu karakter spasi tunggal. global)
    // Membalikkan kata
    const reversedWord = cleanWord.split('').reverse().join('');    // untuk memecah string jadi array karakter   //membalikkan urutan elemen dalam array.  //menggabungkan semua elemen dalam array menjadi sebuah string
    // Memeriksa apakah kata asli sama dengan kata yang telah dibalikkan
    return cleanWord === reversedWord;
}
const inputWord = prompt("Masukkan sebuah kata: ");
if (isPalindrome(inputWord)) {
    alert(`${inputWord} adalah kata palindrom.`);
} else {
    alert(`${inputWord} bukan kata palindrom.`);
}
