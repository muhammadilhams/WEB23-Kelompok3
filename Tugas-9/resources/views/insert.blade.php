<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Tambah Mata Kuliah</h2>
  <form method="POST" enctype="multipart/form-data" action="{{route('simpan')}}">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
      <label for="Nama_Matakuliah">Mata Kuliah:</label>
      <input type="text" class="form-control" name="Nama_Matakuliah">
    </div>
    <div class="form-group">
      <label for="SKS">SKS:</label>
      <input type="number" class="form-control" name="SKS">
    </div>
    <div class="form-group">
      <label for="Ruangan">Ruangan:</label>
      <input type="text" class="form-control" name="Ruangan">
    </div>
    <div class="mb-3">
  <label for="Gambar" class="form-label">Input Foto</label>
  <input class="form-control" type="file" name="Gambar" id="Gambar">
</div>  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
