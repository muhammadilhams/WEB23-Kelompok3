let numberStr = prompt("Masukkan Text : ") 
const NumArray = numberStr.split('');  

if (NumArray.length == 1) {  //
    console.log(`${numberStr} adalah Text palindrome`);
} else {
    const reversedNumArray = NumArray.reverse();  //reversedNumArray itu untuk di tukar atau di balek misal 1234 jdi 4321
    const reversedNumberStr = reversedNumArray.join(''); //ini di gabung dan tidak ada pemisah nya 

    if (numberStr === reversedNumberStr) { //numberStr === reversedNumberStr itu sm ki dia polindrom 
        console.log(`${numberStr} adalah Text palindrome`);
    } else {
        console.log(`${numberStr} bukan Text palindrome`); //klo nd bkn ki 
    }
}