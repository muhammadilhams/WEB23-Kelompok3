<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;
    protected $table='mata_kuliahs';
    protected $primaryKey='id';
    protected $keyType='integer';
    protected $fillable=['Nama_Matakuliah','SKS','Ruangan','Gambar'];
}
