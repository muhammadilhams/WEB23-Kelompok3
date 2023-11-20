var body=document.querySelector("body")

var table=document.querySelector('table')


function ubah(){
    let input=document.getElementById('input')
    // console.log(input.textContent)
    input.textContent="Selesai"
    let xhr=new XMLHttpRequest()
    xhr.open('POST','data.php',true);
    xhr.onload=()=>{
        if(xhr.status==200){
            let data = xhr.response
            

        }else{
            console.error("Gagal mengambil data"+xhr.status)
            console.log("Gagal")
        }
    }
    xhr.send()
    console.log("Fungsi jalan")
}
