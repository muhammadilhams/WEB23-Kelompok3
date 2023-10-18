let str=prompt("Masukkan kata")
let strs=str.split('')
let newstr=strs.reverse()
newstr=newstr.join('')
if(str==newstr){
    alert("Palindrom")
}
else{
    alert("Bukan Palindrom")
}