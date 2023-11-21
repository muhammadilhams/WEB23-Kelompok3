let kata1 = prompt("Masukkan kata")
let kata2 = kata1.split('')
let newstr = kata2.reverse()
newstr=newstr.join('')

if (kata1==newstr){
    alert("Palindrom")
}
else{
    alert("Bukan Palindrom")
}