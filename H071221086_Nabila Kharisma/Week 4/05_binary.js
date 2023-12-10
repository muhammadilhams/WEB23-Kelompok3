let angka = parseInt(prompt("Masukkan Angka : ")) 

if (angka === 0) { //ini untuk kondisi o binary ny 0 ji 
    alert(`dalam bentuk binary adalah 0`);
}else {
    let binary = ''  //di binikin dulu variabel binery kosong untk smntara  
    while (angka>0){  //dmna klo angka nya lebuh besar 0 
        let sisa = angka%2 //variabel bru itu sisa, sisa itu sm dgn angka yg di ksi msuk diangka bru di bagi 2 bru di cri sisa nya brp 
        binary = sisa+binary //binary yg td kosong itu di atas itu sisanya + dgn binary 
        angka = Math.floor(angka/2)//untuk bulatka angkanya //ini untuk membulatkan kebawah misal 7,5 jdi 7 , trs ini 7 di bagi lg 2 smpe nya jdi 1 atau 0 
    }
    alert(`dalam bentuk binary adalah ${binary}`);
}