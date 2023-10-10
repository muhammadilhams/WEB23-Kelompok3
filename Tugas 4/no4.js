// Tanpa menggunakan array.sort 
// buatlah sebuah program yang dimana 
// program tersebut meminta angka sebanyak
// n lalu kemudian akan diatur atau diurutkan 
// mulai dari yang terkecil.
// Contoh n=5 maka akan diberikan 5 angka
// 50 20 1 45 3 lalu program akan mengeluarkan 
// 1 3 20 45 50.
let len=parseInt(prompt("Masukkan nilai N"));
let input=prompt("Masukkan Angka : ");
console.log(input)
let number=input.split(" ");

for (let i=0;i<number.length;i++){
    number[i]=parseInt(number[i])
    if(Number.isNaN(number[i])){
        number.splice(i)
        alert('Inputan harus berupa angka')
    }
}


if (number.length>len){
    alert("Angka overload")
}else if(number.length<len){
    alert("Input angka kurang")
}else if(number.length==0){
    alert('Input Angka woy')
}
else{


// Menggunakan Bubble sort
// (Ini ji yg kupaham njir )

    function Bubblesort(array){
        let done=false
        while(!done){
            done=true
            for(let i=1;i<array.length;i++){
                if(array[i]<array[i-1]){
                    done=false
                    let help=array[i-1]
                    array[i-1]=array[i]
                    array[i]=help
                }
            }
        }
        return array
    }

    Bubblesort(number)
    alert(number)
}