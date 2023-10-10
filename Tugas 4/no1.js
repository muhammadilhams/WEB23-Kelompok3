// let a=parseInt(prompt("Masukkan angka 1 :"))
// let b=parseInt(prompt("Masukkan angka 2 : "))

// let c=a**b
// alert(`Hasilnya adalah ${c}`)

// Cara lain
let a=parseInt(prompt("Masukkan angka 1 :"))
let b=parseInt(prompt("Masukkan angka 2 : "))
let c=a
while (b>1){
    
    a*=c
    b-=1
    console.log(`A${a} B${b}`)
}
alert(a)