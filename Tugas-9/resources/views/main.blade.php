<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div>
        <h1>Daftar Mata Kuliah  </h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Ruangan</th>
                    <th>Gambar</th>
                    <th>Opsi</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($Listmatkul as $matkul)
                    <tr>
                        <td>{{$matkul->Nama_Matakuliah}}</td>
                        <td>{{$matkul->SKS}}</td>
                        <td>{{$matkul->Ruangan}}</td>
                        <td><img src="{{asset(.'img/'.$matkul->Gambar)}}" width="100px"></td>
                        <td>
                        <a class="btn btn-success"  href="{{url('matkul/ubah/'.$matkul->id)}}">Update</a>
                        <a class="btn btn-danger" onclick="check()" href="{{route('hapus',$matkul->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tr>
            </tbody>
        
        </table>
        <!-- <a class="btn btn-secondary" href="{{URL::to('matkul/create')}}">Ekspor PDF</a> -->
        <a class="btn btn-secondary" href="{{URL::to('matkul/create')}}">Tambah Mata Kuliah</a>
    </div>
    <script>
        function check(){
            var result =confirm ("Anda Yakin?");
            if (result==false){
                event.preventDefault();
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>