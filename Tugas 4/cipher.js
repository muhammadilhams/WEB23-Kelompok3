let word=prompt("Input Huruf : ")
let geser=parseInt(prompt("Nilai n"))

// Deklarasi array huruf awal
let words=[]
words=word.split('')

// Deklarasi array huruf setelah di geser
let final=[]
// Looping array huruf awal
for (let i=0;i<word.length;i++){
    if(Number.isNaN(geser)){
        alert("Inputan N harus berupa huruf")
        break
    }
    let charcode=word[i].charCodeAt(0)
    if(charcode<65){
        alert("Masukkan String")
        break
    }
    else if (charcode>122){
        alert("Masukkan String")
        break
    }
    else if (charcode>90&&charcode<97){
        alert("Masukkan String")
        break
    }
    let code=charcode+=geser
    if(code>122){
        code-=26
    }
    else if(code>90&&code<97){
        code-=26
    }
    let shifted_char=String.fromCharCode(code)
    final.push(shifted_char)
    
}
final=final.join('');
alert(final)